<?php declare(strict_types=1);

namespace App\Util;

use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

trait ValidatorAwareTrait
{
    /**
     * @var ValidatorInterface
     */
    protected $validator;

    /**
     * @required
     *
     * @param ValidatorInterface $validator
     */
    public function setValidator(ValidatorInterface $validator): void
    {
        $this->validator = $validator;
    }

    /**
     * @param mixed $value
     * @param null $constraints
     * @param null $groups
     * @return ConstraintViolationListInterface
     */
    public function validate($value, $constraints = null, $groups = null): ConstraintViolationListInterface
    {
        return $this->validator->validate($value, $constraints, $groups);
    }

    /**
     * @param mixed $object
     * @param null $constraints
     * @param null $groups
     */
    public function validateAndThrow($object, $constraints = null, $groups = null): void
    {
        $errors = $this->validator->validate($object, $constraints, $groups);
        if (count($errors) > 0) {
            $errorsMessages = [];
            /** @var ConstraintViolationInterface $row */
            foreach ($errors as $row) {
                $errorsMessages[] = $row->getPropertyPath() . ': ' . $row->getMessage();
            }

            throw new BadRequestHttpException(implode(' | ', $errorsMessages));
        }
    }
}

<?php declare(strict_types=1);

namespace App\Util;

use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

trait ValidatorAwareTrait
{
    /**
     * @var ValidatorInterface
     */
    protected ValidatorInterface $validator;

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
     * @param $value
     * @param null $constraints
     * @param null $groups
     *
     * @return ConstraintViolationListInterface
     */
    public function validate($value, $constraints = null, $groups = null): ConstraintViolationListInterface
    {
        return $this->validator->validate($value, $constraints, $groups);
    }

    /**
     * @param $object
     * @param string|null $exceptionType
     * @param null        $constraints
     * @param null        $groups
     */
    public function validateAndThrowHttpException(
        $object,
        string $exceptionType = BadRequestHttpException::class,
        $constraints = null,
        $groups = null
    ): void {
        if (!is_a($exceptionType, HttpException::class, true)) {
            throw new \InvalidArgumentException("You provide not valid 'HttpException' className");
        }

        $errors = $this->validator->validate($object, $constraints, $groups);

        if (0 === $errors->count()) {
            return;
        }

        throw new $exceptionType($this->getErrorMessage($errors));
    }

    /**
     * @param $object
     * @param null $constraints
     * @param null $groups
     */
    public function validateAndThrow($object, $constraints = null, $groups = null): void
    {
        $errors = $this->validator->validate($object, $constraints, $groups);

        if (count($errors) > 0) {
            throw new BadRequestHttpException($this->getErrorMessage($errors));
        }
    }

    /**
     * @param $object
     * @param null $constraints
     * @param null $groups
     *
     * @return string|null
     */
    public function validateAndGetErrors($object, $constraints = null, $groups = null): ?string
    {
        $errors = $this->validator->validate($object, $constraints, $groups);
        if (count($errors) > 0) {
            $errorsMessages = [];
            /** @var ConstraintViolationInterface $row */
            foreach ($errors as $row) {
                $errorsMessages[] = $row->getPropertyPath() . ': ' . $row->getMessage();
            }

            return implode(' | ', $errorsMessages);
        }

        return null;
    }

    /**
     * @param ConstraintViolationListInterface $constraintViolationList
     *
     * @return string
     */
    private function getErrorMessage(ConstraintViolationListInterface $constraintViolationList): string
    {
        $errorMessages = [];

        foreach ($constraintViolationList as $constraintViolation) {
            $errorMessages[] = $constraintViolation->getMessage();
        }

        return implode(';', $errorMessages);
    }
}

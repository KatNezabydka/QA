<?php declare(strict_types=1);

namespace App\DTO\Request;

use App\Enum\StatusEnum;
use Elao\Enum\Bridge\Symfony\Validator\Constraint\Enum;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

class UpdateQARequest implements RequestDTOInterface
{
    /**
     * @Assert\Type(
     *     type="string",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     */
    private $title;

    /**
     * @Enum(StatusEnum::class, asValue=true)
     */
    private $status;

    /**
     * QACreateRequest constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->title = $request->get('title');
        $this->status = $request->get('status');
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @return StatusEnum|null
     */
    public function getStatus(): ?StatusEnum
    {
        return StatusEnum::get($this->status);
    }
}

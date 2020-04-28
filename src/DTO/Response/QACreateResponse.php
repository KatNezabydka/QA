<?php declare(strict_types=1);

namespace App\DTO\Request;

use App\Enum\ChannelEnum;
use App\Enum\StatusEnum;
use Elao\Enum\Bridge\Symfony\Validator\Constraint\Enum;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

class QACreateResponse implements RequestDTOInterface
{
    /**
     * @Assert\NotBlank(message="Your title is blank")
     */
    private $title;

    /**
     * @Assert\Type(
     *     type="boolean",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     */
    private $promoted;

    /**
     * @Assert\NotBlank(message="Your field is blank")
     * @Enum(StatusEnum::class, asValue=true)
     */
    private $status;

    /**
     * @Assert\NotBlank(message="Your field is blank")
     * @Enum(ChannelEnum::class, asValue=true)
     */
    private $channel;

    /**
     * @Assert\Type(type="string")
     */
    private $content;

    /**
     * QACreateRequest constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->title = $request->get('title');
        $this->promoted = $request->get('promoted');
        $this->status = $request->get('status');
        $this->channel = $request->get('channel');
        $this->content = $request->get('content');
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return bool
     */
    public function getPromoted(): bool
    {
        return $this->promoted;
    }

    /**
     * @return StatusEnum
     */
    public function getStatus(): StatusEnum
    {
        return StatusEnum::get($this->status);
    }

    /**
     * @return ChannelEnum
     */
    public function getChannel(): ChannelEnum
    {
        return ChannelEnum::get($this->channel);
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }
}

<?php declare(strict_types=1);

namespace App\DTO\Request;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use App\Enum\StatusEnum;
use App\Enum\ChannelEnum;

class QACreateRequest implements RequestDTOInterface
{
    /* @var string
     *
     * @Assert\NotBlank()
     * @Assert\Type(type="string")
     */
    private $title;

    /* @var boolean
     *
     * @Assert\Type(
     *     type="boolean",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     **/
    private $promoted;

    /* @var string
     *
     * @Assert\NotBlank()
     * @Assert\Type(type="string")
     * @ Assert\Choice({StatusEnum::DRAFT, StatusEnum::PUBLISHED},
     *      message="The value {{ value }} is not a valid choise."
     *     )
     * @Assert\Choice(choices=StatusEnum::DRAFT, message="Choose a valid status.")
     */
    private $status;

    /* @var string
     *
     * @Assert\NotBlank()
     * @Assert\Type(type="string")
     * @Assert\Choice({"faq", "bot"})
     */
    private $channel;

    /* @var string
     *
     * @Assert\Type(type="string")
     */
    private $content;

    /**
     * QACreateRequest constructor.
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
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getChannel(): string
    {
        return $this->channel;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }
}

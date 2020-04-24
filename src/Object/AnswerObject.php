<?php declare(strict_types=1);

namespace App\Object;

class AnswerObject
{
    /**
     * @var string
     */
    private $channel;

    /**
     * @var string
     */
    private $content;

    /**
     * @return string
     */
    public function getChannel(): string
    {
        return $this->channel;
    }

    /**
     * @param mixed $channel
     * @return AnswerObject
     */
    public function setChannel($channel): AnswerObject
    {
        $this->channel = $channel;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return AnswerObject
     */
    public function setContent(string $content): AnswerObject
    {
        $this->content = $content;
        return $this;
    }
}

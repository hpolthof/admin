<?php namespace Hpolthof\Admin\Widget\Navbar\Messages;


use Hpolthof\Admin\AdminException;

class GravatarMessage extends BaseMessage
{
    protected $email;
    protected $author;
    protected $date;
    protected $subject;

    public function render()
    {
        $subject = e($this->subject);
        $author = e($this->author);
        $date = $this->date;

        $md5 = md5($this->email);

        $content = <<<EOF
<a>
<div class="pull-left">
    <img src="https://www.gravatar.com/avatar/{$md5}?s=64&d=mm" class="img-circle" />
</div>
<h4>
    {$author}
    <small><i class="fa fa-clock-o"></i> {$date}</small>
</h4>
<p>{$subject}</p></a>
EOF;

        parent::setContent($content);

        return parent::render();
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return GravatarMessage
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     * @return GravatarMessage
     */
    public function setAuthor($author)
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     * @return GravatarMessage
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     * @return GravatarMessage
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    public function setContent($content)
    {
        throw new AdminException('setContent is not available in this instance.');
    }


}
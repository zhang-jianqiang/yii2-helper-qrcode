<?php
namespace lulubin\qrcode\formats;

use lulubin\qrcode\traits\EmailTrait;
use lulubin\qrcode\traits\UrlTrait;

class MeCard extends FormatAbstract
{
    use EmailTrait;
    use UrlTrait;

    /**
     * @var string the name
     */
    public $firstName;
    /**
     * @var string the full name
     */
    public $lastName;
    /**
     * @var string the nickname
     */
    public $nickName;
    /**
     * @var string the address
     */
    public $address;
    /**
     * @var string designates a text string to be set as the telephone number in the phonebook. (1 to 24 digits)
     */
    public $phone;
    /**
     * @var string designates a text string to be set as the videophone number in the phonebook. (1 to 24 digits)
     */
    public $videoPhone;
    /**
     * @var string a date in the format YYYY-MM-DD or ISO 860
     */
    public $birthday;
    /**
     * @var string designates a text string to be set as the memo in the phonebook. (0 or more characters)
     */
    public $note;
    /**
     * @var string designates a text string to be set as the kana name in the phonebook. (0 or more characters)
     */
    public $sound;

    /**
     * @return string
     */
    public function getText()
    {
        $data = [];
        $data[] = "MECARD:";
        $data[] = "N:{$this->lastName} {$this->firstName};";
        $data[] = "SOUND:{$this->sound};";
        $data[] = "TEL:{$this->phone};";
        $data[] = "TEL-AV:{$this->videoPhone};";
        $data[] = "EMAIL:{$this->email};";
        $data[] = "NOTE:{$this->note};";
        $data[] = "BDAY:{$this->birthday};";
        $data[] = "ADR:{$this->address};";
        $data[] = "URL:{$this->url};";
        $data[] = "NICKNAME:{$this->nickName};\n;";

        return implode("\n", $data);
    }
}
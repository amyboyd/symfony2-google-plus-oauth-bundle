<?php

namespace AW\Bundle\GooglePlusBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AW\Bundle\GooglePlusBundle\Entity\User
 *
 * @ORM\Table(name="awgoogleplus_user")
 * @ORM\Entity(repositoryClass="AW\Bundle\GooglePlusBundle\Entity\UserRepository")
 */
class User
{
    /**
     * @var string $id Google ID.
     * @ORM\Column(name="id", type="string", length=255)
     * @ORM\Id
     */
    private $id;

    /**
     * @var string $displayName
     * @ORM\Column(name="display_name", type="string", length=255)
     */
    private $displayName;

    /**
     * @var string $url
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var string $imageUrl
     * @ORM\Column(name="image_url", type="string", length=255, nullable=true)
     */
    private $imageUrl;

    /**
     * @var string $allDataJson
     * @ORM\Column(name="all_data_json", type="text")
     */
    private $allDataJson;

    /**
     * A string with the following form:
     * {"access_token":"TOKEN", "refresh_token":"TOKEN", "token_type":"Bearer", "expires_in":3600, "id_token":"TOKEN", "created":1320790426}
     *
     * @var string $tokenJson
     * @ORM\Column(name="token_json", type="text")
     */
    private $tokenJson;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->updateWithNewData($data);
    }

    public function updateWithNewData(array $data)
    {
        if ($this->id != $data['id']) {
            throw new \AW\Bundle\GooglePlusBundle\Exception('IDs don\'t match');
        }

        $this->displayName = $data['displayName'];
        $this->url = $data['url'];
        $this->imageUrl = (isset($data['image']) ? $data['image']['url'] : null);
        $this->allDataJson = json_encode($data);
    }

    public function setToken($token)
    {
        if (is_string($token)) {
            $this->tokenJson = $token;
        }
        elseif (is_array($token)) {
            $this->tokenJson = json_encode($token);
        }
        else {
            throw new \AW\Bundle\GooglePlusBundle\Exception('Unexpected type of token');
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDisplayName()
    {
        return $this->displayName;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    public function getAllDataJson()
    {
        return $this->allDataJson;
    }

    public function getTokenJson()
    {
        return $this->tokenJson;
    }
}

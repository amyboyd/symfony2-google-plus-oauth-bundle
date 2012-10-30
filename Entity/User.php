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
     * @var integer $id Google ID.
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     */
    private $id;

    /**
     * @var text $allDataSerialized
     * @ORM\Column(name="all_data_serialized", type="text")
     */
    private $allDataSerialized;

    /**
     * @var string $token
     * @ORM\Column(name="token", type="string", length=255, nullable=true)
     */
    private $token;

    /**
     * @var string $tokenSecret
     * @ORM\Column(name="token_secret", type="string", length=255, nullable=true)
     */
    private $tokenSecret;

    public function __construct(\stdClass $data)
    {
        $this->id = $data->id;
        $this->updateWithNewData($data);
    }

    public function updateWithNewData(\stdClass $data)
    {
        if ($this->id != $data->id) {
            throw new \AW\Bundle\GooglePlusBundle\Exception('IDs don\'t match');
        }

        $this->allDataSerialized = serialize($data);
    }

    public function setToken(array $token)
    {
        $this->token = $token['oauth_token'];
        $this->tokenSecret = $token['oauth_token_secret'];
    }

    public function getId()
    {
        return $this->id;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function getTokenSecret()
    {
        return $this->tokenSecret;
    }

    public function getAllDataSerialized()
    {
        return $this->allDataSerialized;
    }
}

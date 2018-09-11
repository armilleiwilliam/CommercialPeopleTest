<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 31/08/2018
 * Time: 13:56
 */

namespace App\Classes;

class Token
{

    /*
     * The token
     *
     * @var string
     */
    private $token;

    /*
     * The payload
     *
     * @var array
     */
    private $payLoad;

    /*
     * Token time start
     *
     * @var \DateTime
     */
    private $iatTime;

    /*
     * Token time expire
     *
     * @var \DateTime
     */
    private $expTime;

    /*
     * The signature
     *
     * @var string
     */
    private $signature;

    public function setPayloadEncoded($payLoad): void
    {
        $this->payLoad = $payLoad;
    }

    public function getPayLoadEncoded(): ?string
    {
        return $this->payLoad;
    }

    public function setPayloadDecoded($payLoad): void
    {
        $this->payLoad = $payLoad;
    }

    public function getPayLoadDecoded(): array
    {
        return $this->payLoad;
    }

    public function setToken($token): void
    {
        $this->token = $token;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setSignatureEncoded($signature): void
    {
        $this->signature = $signature;
    }

    public function getSignatureEncoded(): ?string
    {
        return $this->signature;
    }

    public function setSignatureDecoded($signature): void
    {
        $this->signature = $signature;
    }

    public function getSignatureDecoded(): ?string
    {
        return $this->signature;
    }

    public function setIssueAt(\DateTime $time): void
    {
        $this->setIssueAt = $time;
    }

    public function getExpireTime(): \DateTime
    {
        return $this->expTime;
    }

    public function setExpireTime($time): void
    {
        $this->expTime = $time;
    }

    public function getIatTime(): \DateTime
    {
        return $this->iatTime;
    }

    public function setIatTime($time): void
    {
        $this->iatTime = $time;
    }

    public function getHeaderEncoded(): ?string
    {
        return $this->header;
    }

    public function setHeaderEncoded(string $header): void
    {
        $this->header = $header;
    }

    public function getHeaderDecoded(): array
    {
        return $this->header;
    }

    public function setHeaderDecoded(array $header): void
    {
        $this->header = $header;
    }
}

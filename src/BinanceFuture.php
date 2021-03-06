<?php
/**
 * @author francis
 * */

namespace Vampcheah\Exchange;


use Vampcheah\Exchange\Api\Futures\User;
use Vampcheah\Exchange\Api\Futures\Trade;
use Vampcheah\Exchange\Api\Futures\Market;

class BinanceFuture
{
    protected $key;
    protected $secret;
    protected $host;

    protected $options=[];

    function __construct(string $key='',string $secret='',string $host='https://fapi.binance.com'){
        $this->key=$key;
        $this->secret=$secret;
        $this->host=$host;
    }

    /**
     *
     * */
    private function init(){
        return [
            'key'=>$this->key,
            'secret'=>$this->secret,
            'host'=>$this->host,

            'options'=>$this->options,
        ];
    }

    /**
     *
     * */
    function setOptions(array $options=[]){
        $this->options=$options;
    }

    /**
     *
     * */
    public function user(){
        return new User($this->init());
    }

    /**
     *
     * */
    public function trade(){
        return new Trade($this->init());
    }

    /**
     *
     * */
    public function market(){
        return new Market($this->init());
    }
}

<?php

namespace Inspetor;

use Inspetor\Client;

class Sale
{
    /**
     * @var Client
     */
    private $client

    /**
     * @param GuzzleHttp\Client $guzzleClient
     */
    public function __construct(Client $client = null)
    {
        $this->client = $client ?? new Client();
    }

    /**
     * 
     */
    public function saleActivity($activity) {

    }

    private function saleCreation() {
        $endpoint = 'sale';
        $body = [
            "id":         "12345",
            "account_id": "157421",
            "status":     "pending",
            "items": $saleItems(),
            "payment": $salePayment(),
            "total_value": 54.26,
            "currency":    "BRL"
        ];
    }

    private function saleUpdate() {}

    private function saleFraudulent() {
        $endpoint = 'sale/mark_fraudulent';
        $fraud_signal_type = ['horus', 'fraudnet', 'sift', 'ingresse', 'chargeback'];

        $body = [
            "sale_id":           "12345",
            "fraud_signal_type": $fraud_signal_type
        ];
    }

    private function saleItems() {
        $body = [
            "id":                 "101",
            "event_id":           "23553",
            "event_datetime_ids": ["101", "102"],
            "value":              25.00
        ];
    }

    private function salePayment() {
        $body = [
            "method":              "credit_card",
            "installments":        1,
            "first_six_digits_cc": "455326",
            "last_four_digits_cc": "0012",
            "holder_name":         "John Fulano",
            "holder_cpf":          "741.112.235-53",
            "billing_address": [
                "street_name":     "Rua Fidalga",
                "street_number":   "252",
                "zip_code":        "05432-010",
                "city":            "São Paulo",
                "state":           "SP",
                "country":         "BR"
            ]
        ],
    }
}

/*
id =                        transactionId
account_id =                customer.id
status =                    status
items
    [                       [
        id =                        session.id
        event_id =                  event.id
        event_datetime_ids =        [session.id, session.id]
        value =                     basket.tickets.price|tax
    ],                      ],
    [                       [
        id =                        session.id
        event_id =                  event.id
        event_datetime_ids =        [session.id, session.id]
        value =                     basket.tickets.price|tax
    ]                       ]
payment                     
    method =                    paymentoption
    installments =              installments
    first_six_digits_cc =           
    last_four_digits_cc =           
    holder_name =                   
    holder_cpf =                    
    billing_address                 
        street_name =                   
        street_number =                 
        zip_code =                      
        city =                          
        state =                         
        country =                       
 */
<?php

namespace HexTechnology\Custard;

class ClientDataSeeder extends SeederUseCase
{
    function seed()
    {
        $this->clientGenerator(
            "David Johnston",
            "David",
            "Johnston",
            "265-6016 Tortor Ave",
            "T3M 6K1",
            "Grumo Appula",
            "(01450) 21815",
            "(016977) 6769",
            "sodalesnisimagna@temporarcuVestibulumca");
        $this->clientGenerator(
            "James Anderson",
            "James",
            "Anderson",
            "612-8676 Ante Road",
            "Y6H 5Y2",
            "Calder",
            "07624 343302",
            "07517 304635",
            "musProinvel@eleifendegestasSednet");
        $this->clientGenerator(
            "Paul Moorehead",
            "Paul",
            "Moorehead",
            "5293 Arcu. Rd.",
            "HH1X 5LG",
            "Paradise",
            "(023) 0016 6387",
            "0800 1111",
            "dignissim.lacus@mi.org");
        $this->clientGenerator(
            "Sam Thompson",
            "Sam",
            "Thompson",
            "1685 Quis Rd.",
            "K5C 2H4",

            "Montalto Uffugo",
            "(01310) 079430",
            "07624 451546",
            "nunc.est.mollis@sedorci.co.uk");
    }
}
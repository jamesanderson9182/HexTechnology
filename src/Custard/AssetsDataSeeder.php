<?php

namespace HexTechnology\Custard;

class AssetsDataSeeder extends SeederUseCase
{
    function seed()
    {
        $asset = $this->assetGenerator(
            $this->assetTypeGenerator("Microphone"),
            $this->manufacturerGenerator("Sure"),
            "Sure SM58",
            "Vocal microphone, boosted slightly in the mid range. Extremely versatile. Hard to damage",
            "SM58");
        $serialNumberCodes = [
            "SM58_1",
            "SM58_2",
            "SM58_3"
        ];
        foreach ($serialNumberCodes as $serialNumberCode) {
            $this->serialNumberGenerator($serialNumberCode, $asset);
        }
        $assetType = $this->assetTypeGenerator("Sound Desk");
        $asset = $this->assetGenerator(
            $assetType,
            $this->manufacturerGenerator("Allen and Heath"),
            "Allen & Heath QU 32",
            "32 Channel, 40 input, 18 output Digital Sound Desk. admin password is 'password'",
            "QU32");
        $this->serialNumberGenerator("QU32X-525659", $asset);
        $manufacturer = $this->manufacturerGenerator("Behringer");
        $asset = $this->assetGenerator($assetType, $manufacturer, "Behringer X1222", "Handy wee desk! ", "X1222");
        $serials = [
            "X122jrdl",
            "X122jraaaaa"
        ];
        foreach ($serials as $serial) {
            $this->serialNumberGenerator($serial, $asset);
        }
    }
}
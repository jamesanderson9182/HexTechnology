<?php

namespace HexTechnology\Integrations\Documents;

use HexTechnology\Models\Quote;
use Rhubarb\Crown\String\StringTools;

class QuotePdf extends PdfDocument
{
    public $quoteID;

    public function __construct()
    {
    }

    /**
     * @param Quote $quote
     * @return string
     */
    public function getContent($quote =[])
    {
		$string = StringTools::parseTemplateString($this->content, $quote);
        $brandContent = "<div style='width: 100%; height: 130px;'>";
        $brandContent .= "";
        $logo = base64_encode(file_get_contents(APPLICATION_ROOT_DIR . '/static/images/logo.png'));
        $content = <<<HTML
<div style='width: 100%; height: 130px;'>
        <div style="background-color: rgba(113, 0, 255, 0.53); height: 50px;">
            <div style="float: left; width: 50%; font-size: 20pt; padding-top: 10px; padding-left: 10px; color: #fff;">
                QUOTE
            </div>
            <div style="float: right; width: 50%; text-align: right;">
                <img src='data:image/png;base64,{$logo}' style='padding-bottom: 10px; height: 50px;' />
            </div>
        </div>

        <div style="clear: both"></div>
        <div>
            <div style='float: left; width: 50%; display: inline-block'>
                Project: {$quote->Project->ProjectName}
                <br> Quote Number: {$quote->QuoteID}
                <br> Quote Date: {$quote->DateCreated}
                <br>
            </div>
            <div style='float: right; width: 50%; display: inline-block; text-align: right'>
                {$quote->Client->ClientDisplayName}
                <br> {$quote->Client->AddressLine1}
                <br> {$quote->Client->Town}
                <br> {$quote->Client->Postcode}
                <br> {$quote->Client->Telephone}
                <br>
            </div>
        </div>
        <div style='clear:both;'></div>
        <div style="display: block;" ">
<style>

table, th, td {
border: 1px solid black;
border-collapse: collapse;
}

</style>
<table style="width:100% ">
    <tr>
        <th>Description of Work</th>
        <th>Price Per Unit</th> 
        <th>Qty / HRS</th>
        <th>Sub Total</th>
    </tr>
HTML;
        foreach ($quote->QuoteItems as $quoteItem)
        {
            $content.=<<<HTML
    <tr>
        <td>{$quoteItem->QuoteItemTitle}</td>
        <td>£{$quoteItem->UnitCost}</td> 
        <td>{$quoteItem->NumberOfUnits}</td>
        <td>£{$quoteItem->Amount}</td>
    </tr>
HTML;
        }
        $content .=<<<HTML
    <tr class="footer ">
        <td></td>
        <td></td> 
        <td>Grand Total</td>
        <td>£{$quote->GrandTotal}</td>
    </tr>
</table>
</div>
<div style=" width: 50%;float: left; ">
<b>PAYMENT TERMS</b><br>
To be made payable within 28 days to<br>
David Johnston<br>
Santander<br>
Account: 86002391<br>
Sort code: 09-01-28<br>
Cheques payable to David Johnston<br>
</div>
<div style=" width: 50%; float: right; ">
<b>CONTACT</b><br>
David Johnston<br>
Mobile 07821131259<br>
ADDRESS:<br>
94 Woodlane<br>
Lurgan<br>
BT66 7EN<br>
Web: <a href="www.hextechnology.co.uk ">hextechnology.co.uk</a><br>
</div>
HTML;

        return $brandContent . $content;
    }
}
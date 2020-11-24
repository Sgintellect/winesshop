<?php
function getGstincluded($Number,$percentToGet,$cgst,$sgst){
 $percentInDecimal = $percentToGet / 100;
 $percentcgst = $percentInDecimal * $Number;
 $percentsgst = $percentInDecimal * $Number;
 $display="<p>";
 if($cgst&&$sgst){
 $gst = $percentcgst + $percentsgst;
 $display .= " CGST = ".$percentcgst." SGST = " . $percentsgst;
 }elseif($cgst){
 $gst = $percentcgst;
 $display .= " CGST = ".$percentcgst;
 }else{
 $gst = $percentsgst;
 $display .= " SGST = ".$percentsgst;
 }
 $withoutgst = $Number - $gst;
 $withgst = $withoutgst + $gst;
 $display .="</p>";
 $display .="<p>".$withoutgst . " + " . $gst . " = " . $withgst."</p>";
 return $display;
}
 
function getGstexcluded($Number,$percentToGet,$cgst,$sgst){
 $percentInDecimal = $percentToGet / 100;
 $percentcgst = $percentInDecimal * $Number;
 $percentsgst = $percentInDecimal * $Number;
 $display="<p>";
 if($cgst&&$cgst){
 $gst = $percentcgst + $percentsgst;
 $display .= " CGST = ".$percentcgst." SGST = " . $percentsgst;
 }elseif($cgst){
 $gst = $percentcgst;
 $display .= " CGST = ".$percentcgst;
 }else{
 $gst = $percentsgst;
 $display .= " SGST = ".$percentsgst;
 }
 $withgst = $Number + $gst;
 $display .="</p>";
 $display .="<p>".$Number . " + " . $gst . " = " . $withgst."</p>";
 return $display;
}
 
function simplegstincluded($number, $percent) {
 $cgst = ($percent / 100) * $number;
 $sgst = ($percent / 100) * $number;
 $gst = $cgst+$sgst;
 $withoutgst = $number - $gst; 
 return "<p> GST Result ".$withoutgst."+".$gst."=".$number."</p>";
}
function simplegstexcluded($number, $percent) {
 $cgst = ($percent / 100) * $number;
 $sgst = ($percent / 100) * $number;
 $gst = $cgst+$sgst;
 $total = $number + $gst; 
 return "<p> GST Result ".$number."+".$gst."=".$total."</p>";
}
echo simplegstincluded(100, 9);
echo simplegstexcluded(100, 9);
echo "GST Included Already ";
echo getGstincluded(100,9,true,true); 
echo "GST Included After ";
echo getGstexcluded(100,9,true,true);
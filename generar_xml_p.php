<?php

header("Content-disposition: attachment; filename=p_xml.xml");
header("Content-type: application/xml");
readfile("p_xml.xml");

?>
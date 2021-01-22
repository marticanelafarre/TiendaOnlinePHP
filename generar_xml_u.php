<?php

header("Content-disposition: attachment; filename=u_xml.xml");
header("Content-type: application/xml");
readfile("u_xml.xml");

?>
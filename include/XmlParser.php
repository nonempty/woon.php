<?php
if (file_exists("./include/Public.php"))
{
	include_once "./include/Public.php"; 
}
else
{
	if (file_exists("./Public.php"))
	{
		include_once "./Public.php"; 
	}
}
 class DhcXmlWriter
 {
	private $xmldoc;
	private $xmlmsg;
	private $lastnode;
	private $lastnodechild;
 	public function __construct()
  {
  	 //ShowMsg ("XML writer begin.");
     $this->xmldoc = new DOMDocument('1.0', 'UTF-8');
     $this->xmldoc->formatOutput = true;
     $this->xmlmsg = $this->xmldoc->createElement('Message');
     if ($this->xmlmsg)
     {
     		$this->xmlmsg->setAttribute ("Version", "1.0");
     }
     $this->lastnode= FALSE;
	 $this->lastnodechild = FALSE;
	 ShowMsg ("XML writer init.");	

  }
	public function __destruct()
  {
      if ($this->xmldoc)
      	unset($this->xmldoc);
  }

	public function AddXmlNode ($nodename)
	{
	    
			if ($this->lastnode)
			{
				if ($this->lastnodechild)	
				{
					$this->lastnode->appendChild  ($this->lastnodechild);
					ShowMsg ("Append one child when add new node ");
				}
				$this->xmlmsg->appendChild ($this->lastnode);
				ShowMsg ("appendChild   ok ");
			
			}
			$this->lastnode = FALSE;
			$this->lastnodechild = FALSE;
			if (strlen($nodename))
			{
					$this->lastnode = $this->xmldoc->createElement($nodename);
					
					if ($this->lastnode)
										ShowMsg ("Add node ok: ". $nodename);
			}
			
	}
	
	public function AddXmlAttribute ($attribname, $attribvalue)
	{
			if (!$this->lastnode)
				return;
	
			if ($attribname)
			{
					if ($this->lastnode->setAttribute ($attribname, $attribvalue))
										ShowMsg ("         Add  Attribute ok ". $attribname. " ". $attribvalue);
			}
			
  }
  	public function AddXmlChildNode ($nodename)
	{
			if (!$this->lastnode)
				return;
			if ($this->lastnodechild)	
			{
				$this->lastnode->appendChild  ($this->lastnodechild);
				ShowMsg ("Append one child   ok ");
			}
			$this->lastnodechild  = FALSE;
		    if (strlen($nodename))
			{
					$this->lastnodechild = $this->xmldoc->createElement($nodename);
					if ($this->lastnodechild)
					{
						ShowMsg ("Add node ok: ". $nodename);
					}
			}
			
  }
  public function AddXmlChildAttribute ($attribname, $attribvalue)
  {
 	 if (!$this->lastnode)
		return;
	if (!$this->lastnodechild)
		return;
	
	if ($attribname)
	{
			if ($this->lastnodechild->setAttribute ($attribname, $attribvalue))
						ShowMsg ("         Add  child node  attribute ok ". $attribname. " ". $attribvalue);
	}
  }
  
  
  public function GetXmlData ()
	{
		if (!$this->xmldoc)
		{
				return "";
		}
		if (!$this->xmlmsg)
		{
				 return "";
			}
			if ($this->lastnode)
			{
					if ($this->lastnodechild)	
					{
						$this->lastnode->appendChild  ($this->lastnodechild);
						ShowMsg ("Append one child when add new node ");
					}
					$this->xmlmsg->appendChild ($this->lastnode);
					
					$this->lastnodechild = FALSE;
					
			}
			$this->xmldoc->appendChild($this->xmlmsg);
		
			$xmldata = $this->xmldoc->saveXML();
				//	if (!$xmldata)
		//		ShowMsg "Save failed.<br/>";
		
		//	ShowMsg " GetXmlData return ".strlen($xmldata).$xmldata." <br>";
			return $xmldata;
  }
	public function AddXmlMsg ($msgid, $destid ="", $msgtypeindex = 0)
  {
  		global $gMsgType;
 		 $sessionid = $_SESSION["SessionId"];  
 		 $userid = $_SESSION["SourceId"];
		 
 	   // ShowMsg ("LOGIN session ". $_SESSION["SessionId"]."   sss    ". $sessionid);
  		if ("" == $destid)
  			$destid= $_SESSION['cmsid'];
		if (!$_SESSION["SequenceNumber"])
			$_SESSION["SequenceNumber"] = 1;
  	//	ShowMsg "AddMsg ". $msgid."<br>";
  		$this->AddXmlNode ("IE_HEADER");
  		$this->AddXmlAttribute ("MessageId", $msgid);
  		$this->AddXmlAttribute ("SessionId", $sessionid);
  		$this->AddXmlAttribute ("MessageType", $gMsgType[$msgtypeindex]);
  		$this->AddXmlAttribute ("SourceId", "WEB_SERVER");
  		$this->AddXmlAttribute ("DestId", $destid);
  		$this->AddXmlAttribute ("SequenceNumber", $_SESSION["SequenceNumber"]);
  		$_SESSION["SequenceNumber"]++;
  //	ShowMsg "AddMsg ". $msgid." ok <br>";
  }
 };	// end of class XmlWriter
  
class DhcXmlReader
 {
	private $xmldoc;
	private $xmlnodelist;
	private $xmlnodeindex;
 	public function __construct()
  {
     $this->xmldoc = new DOMDocument('1.0', 'UTF-8');
     $this->xmlnodeindex = 0;
  }
	public function __destruct()
  {
      if ($this->xmldoc)
      	unset($this->xmldoc);
  }
	public function Parse ($xmldata)
	{
			if (!$this->xmldoc)
			{
					ShowMsg ("XML parser does not initiated.");
					return FALSE;
			}
			$xmlutf8data = $xmldata;//iconv ("GB2312", "UTF-8",$xmldata);
			ShowMsg ($xmlutf8data, 1);
		//	$ret = $this->xmldoc->load ("c:/aa.xml");
			$ret = $this->xmldoc->loadXML ($xmlutf8data);
			if (!$ret)
			{
					ShowMsg ("XML parse failed. <br/>");
					$ret = FALSE;
			}
			else
			{
					ShowMsg ("xml parse ok");
					$ret = TRUE;
			}
			 $this->xmlnodeindex = 0;
			return $ret;
	}
	public function GetXmlNode ($nodename)
	{
			if (!$this->xmldoc)
			{
					ShowMsg ("GetXmlNode  does not initiated..");
					return FALSE;
			}
			$this->xmlnodelist = $this->xmldoc -> getElementsByTagName ($nodename);
			 $this->xmlnodeindex = 0;
			if (!($this->xmlnodelist))
				return FALSE;
			$this->xmlnodeindex = -1;
			if ($this->xmlnodelist->length > 0)
				return TRUE;
			else
				return FALSE;
	}
	public function GetXmlNodeNext ()
	{
			$this->xmlnodeindex++;
			if ($this->xmlnodeindex >= $this->xmlnodelist->length)
			{
				  ShowMsg ("Nodelist item error at index ". $this->xmlnodeindex);
					return FALSE;
			}	
			return TRUE;
	}	 
	public function GetXmlAttribute ($attrib)
	{
			if (-1 == $this->xmlnodeindex  )
				$this->xmlnodeindex = 0;
			if ($this->xmlnodeindex >= $this->xmlnodelist->length)
			{
				 ShowMsg ("Nodelist item error at index ". $this->xmlnodeindex);
					return FALSE;
			}
			$xmlnode = $this->xmlnodelist->item($this->xmlnodeindex);
			if (!$xmlnode)
			{
				   ShowMsg ("Node not found at index ". $this->xmlnodeindex);
					return FALSE;
				}
			if (!($xmlnode->attributes))
			{
					ShowMsg ("Node has no attributes");
					return FALSE;
			}
			$xmlattrib = $xmlnode->attributes->getNamedItem ($attrib);
			if (NULL == $xmlattrib)
			{
					ShowMsg ("Node has no attributes NULL");
					return FALSE;
			}	
			if (FALSE == $xmlattrib)
			{
					ShowMsg ("Node has no attributes FALSE");
					return FALSE;
			}
			return $xmlattrib->nodeValue;
	}
 };// end of class XmlReader
?>
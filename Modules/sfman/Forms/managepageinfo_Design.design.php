<?php
namespace Modules\sfman\Forms;
use core\CoreClasses\services\FormDesign;
use core\CoreClasses\html\ListTable;
use core\CoreClasses\html\Div;
use core\CoreClasses\html\link;
use core\CoreClasses\html\Lable;
use core\CoreClasses\html\TextBox;
use core\CoreClasses\html\DataComboBox;
use core\CoreClasses\html\SweetButton;
use core\CoreClasses\html\CheckBox;
use core\CoreClasses\html\RadioBox;
use core\CoreClasses\html\SweetFrom;
use core\CoreClasses\html\ComboBox;
use core\CoreClasses\html\FileUploadBox;
use Modules\common\PublicClasses\AppRooter;
use Modules\common\PublicClasses\UrlParameter;
/**
*@author Hadi AmirNahavandi
*@creationDate 1396-07-06 - 2017-09-28 03:52
*@lastUpdate 1396-07-06 - 2017-09-28 03:52
*@SweetFrameworkHelperVersion 2.002
*@SweetFrameworkVersion 2.002
*/
class managepageinfo_Design extends FormDesign {
	private $Data;
	/**
	 * @param mixed $Data
	 */
	public function setData($Data)
	{
		$this->Data = $Data;
	}    
private $adminMode=true;

    /**
     * @param bool $adminMode
     */
    public function setAdminMode($adminMode)
    {
        $this->adminMode = $adminMode;
    }
	/** @var textbox */
	private $title;
	/**
	 * @return textbox
	 */
	public function getTitle()
	{
		return $this->title;
	}
	/** @var textbox */
	private $description;
	/**
	 * @return textbox
	 */
	public function getDescription()
	{
		return $this->description;
	}
	/** @var textbox */
	private $keywords;
	/**
	 * @return textbox
	 */
	public function getKeywords()
	{
		return $this->keywords;
	}
	/** @var textbox */
	private $themepage;
	/**
	 * @return textbox
	 */
	public function getThemepage()
	{
		return $this->themepage;
	}
	/** @var textbox */
	private $internalurl;
	/**
	 * @return textbox
	 */
	public function getInternalurl()
	{
		return $this->internalurl;
	}
	/** @var textbox */
	private $canonicalurl;
	/**
	 * @return textbox
	 */
	public function getCanonicalurl()
	{
		return $this->canonicalurl;
	}
	/** @var textbox */
	private $sentenceinurl;
	/**
	 * @return textbox
	 */
	public function getSentenceinurl()
	{
		return $this->sentenceinurl;
	}
	/** @var SweetButton */
	private $btnSave;
	public function __construct()
	{
		$this->title= new textbox("title");
		$this->description= new textbox("description");
		$this->keywords= new textbox("keywords");
		$this->themepage= new textbox("themepage");
		$this->internalurl= new textbox("internalurl");
		$this->canonicalurl= new textbox("canonicalurl");
		$this->sentenceinurl= new textbox("sentenceinurl");
		$this->btnSave= new SweetButton(true,"ذخیره");
		$this->btnSave->setAction("btnSave");
	}
	public function getBodyHTML($command=null)
	{
		if (key_exists("pageinfo", $this->Data))
			$this->title->setValue($this->Data['pageinfo']->getTitle());
		if (key_exists("pageinfo", $this->Data))
			$this->description->setValue($this->Data['pageinfo']->getDescription());
		if (key_exists("pageinfo", $this->Data))
			$this->keywords->setValue($this->Data['pageinfo']->getKeywords());
		if (key_exists("pageinfo", $this->Data))
			$this->themepage->setValue($this->Data['pageinfo']->getThemepage());
		if (key_exists("pageinfo", $this->Data))
			$this->internalurl->setValue($this->Data['pageinfo']->getInternalurl());
		if (key_exists("pageinfo", $this->Data))
			$this->canonicalurl->setValue($this->Data['pageinfo']->getCanonicalurl());
		if (key_exists("pageinfo", $this->Data))
			$this->sentenceinurl->setValue($this->Data['pageinfo']->getSentenceinurl());
		$Page=new Div();
		$Page->setClass("sweet_formtitle");
		$Page->setId("sfman_managepageinfo");
		$PageTitlePart=new Div();
		$PageTitlePart->setClass("sweet_pagetitlepart");
		$PageTitlePart->addElement(new Lable("managepageinfo"));
		$Page->addElement($PageTitlePart);
		$MessagePart=new Div();
		$MessagePart->setClass("sweet_messagepart");
		$MessagePart->addElement(new Lable($this->getMessage()));
		$Page->addElement($MessagePart);
		$LTable1=new ListTable(2);
		$LTable1->setClass("formtable");
		$LTable1->addElement(new Lable("title"));
		$LTable1->setLastElementClass('form_item_caption');
		$LTable1->addElement($this->title);
		$LTable1->setLastElementClass('form_item_field');
		$LTable1->addElement(new Lable("description"));
		$LTable1->setLastElementClass('form_item_caption');
		$LTable1->addElement($this->description);
		$LTable1->setLastElementClass('form_item_field');
		$LTable1->addElement(new Lable("keywords"));
		$LTable1->setLastElementClass('form_item_caption');
		$LTable1->addElement($this->keywords);
		$LTable1->setLastElementClass('form_item_field');
		$LTable1->addElement(new Lable("themepage"));
		$LTable1->setLastElementClass('form_item_caption');
		$LTable1->addElement($this->themepage);
		$LTable1->setLastElementClass('form_item_field ltr_field');
		$LTable1->addElement(new Lable("internalurl"));
		$LTable1->setLastElementClass('form_item_caption');
		$LTable1->addElement($this->internalurl);
		$LTable1->setLastElementClass('form_item_field ltr_field');
		$LTable1->addElement(new Lable("canonicalurl"));
		$LTable1->setLastElementClass('form_item_caption');
		$LTable1->addElement($this->canonicalurl);
		$LTable1->setLastElementClass('form_item_field ltr_field');
		$LTable1->addElement(new Lable("sentenceinurl"));
		$LTable1->setLastElementClass('form_item_caption');
		$LTable1->addElement($this->sentenceinurl);
		$LTable1->setLastElementClass('form_item_field ltr_field');
		$LTable1->addElement($this->btnSave,2);
		$LTable1->setLastElementClass('form_item_sweetbutton');
		$Page->addElement($LTable1);
		$form=new SweetFrom("", "POST", $Page);
		return $form->getHTML();
	}
}
?>
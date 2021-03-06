<?php
namespace Modules\buysell\Forms;
use core\CoreClasses\services\FormCode;
use Modules\languages\PublicClasses\ModuleTranslator;
use Modules\languages\PublicClasses\CurrentLanguageManager;
use Modules\buysell\Controllers\managecarsController;
use Modules\files\PublicClasses\uploadHelper;
/**
*@author Hadi AmirNahavandi
*@creationDate 1396-03-29 - 2017-06-19 19:04
*@lastUpdate 1396-03-29 - 2017-06-19 19:04
*@SweetFrameworkHelperVersion 2.001
*@SweetFrameworkVersion 2.001
*/
class managecars_Code extends FormCode {

    private $adminMode=true;

    /**
     * @param bool $adminMode
     */
    public function setAdminMode($adminMode)
    {
        $this->adminMode = $adminMode;
    }
    public function __construct($namespace=null)
    {
        parent::__construct($namespace);
        $this->setThemePage("admin.php");
        $this->setTitle("مدیریت خودروها");
        $this->setAdminMode(true);
    }
	public function load()
	{
		$managecarsController=new managecarsController();
        $managecarsController->setAdminMode($this->adminMode);
		$translator=new ModuleTranslator("buysell");
		$translator->setLanguageName(CurrentLanguageManager::getCurrentLanguageName());
		if(isset($_GET['delete']))
			$Result=$managecarsController->DeleteItem($this->getID(),$this->getHttpGETparameter('groupid',1));
		else{
			$Result=$managecarsController->load($this->getHttpGETparameter('pn',-1),$this->getHttpGETparameter('groupid',1));
		}
		$design=new managecars_Design();
        $design->setAdminMode($this->adminMode);
		$design->setData($Result);
		$design->setMessage("");
		return $design->getBodyHTML();
	}
	public function getID()
	{
		$id=-1;
		if(isset($_GET['id']))
			$id=$_GET['id'];
		return $id;
	}
}
?>
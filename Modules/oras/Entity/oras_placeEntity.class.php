<?php
namespace Modules\oras\Entity;
use core\CoreClasses\services\EntityClass;
use core\CoreClasses\services\FieldInfo;
use core\CoreClasses\db\dbquery;
use core\CoreClasses\db\dbaccess;
use core\CoreClasses\services\FieldType;
/**
*@author Hadi AmirNahavandi
*@creationDate 1396-07-12 - 2017-10-04 03:01
*@lastUpdate 1396-07-12 - 2017-10-04 03:01
*@SweetFrameworkHelperVersion 2.014
*@SweetFrameworkVersion 1.018
*/
class oras_placeEntity extends EntityClass {
	public function __construct(dbaccess $DBAccessor)
	{
		$this->setDatabase(new dbquery($DBAccessor));
		$this->setTableName("oras_place");
		$this->setTableTitle("بخش");
		$this->setTitleFieldName("title");

		/******** title ********/
		$TitleInfo=new FieldInfo();
		$TitleInfo->setTitle("عنوان");
		$this->setFieldInfo(oras_placeEntity::$TITLE,$TitleInfo);
		$this->addTableField('1',oras_placeEntity::$TITLE);
	}
	public static $TITLE="title";
	/**
	 * @return mixed
	 */
	public function getTitle(){
		return $this->getField(oras_placeEntity::$TITLE);
	}
	/**
	 * @param mixed $Title
	 */
	public function setTitle($Title){
		$this->setField(oras_placeEntity::$TITLE,$Title);
	}
}
?>
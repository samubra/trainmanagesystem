<?php
Yii::import('zii.widgets.CMenu');
class Menu extends CMenu
{
	public $linkLabelWrapperCss;
	public $textColor='';
	public $submenu=false;
	/**
	 * Recursively renders the menu items.
	 * @param array $items the menu items to be rendered recursively
	 */
	protected function renderMenuRecursive($items)
	{
		$count=0;
		$n=count($items);
		foreach($items as $item)
		{
			$count++;
			$options=isset($item['itemOptions']) ? $item['itemOptions'] : array();
			$class=array();
			if($item['active'] && $this->activeCssClass!='')
				$class[]=$this->activeCssClass;
			if($count===1 && $this->firstItemCssClass!==null)
				$class[]=$this->firstItemCssClass;
			if($count===$n && $this->lastItemCssClass!==null)
				$class[]=$this->lastItemCssClass;
			if($this->itemCssClass!==null)
				$class[]=$this->itemCssClass;
			if($class!==array())
			{
				if(empty($options['class']))
					$options['class']=implode(' ',$class);
				else
					$options['class'].=' '.implode(' ',$class);
			}
	
			echo CHtml::openTag('li', $options);
	
			$menu=$this->renderMenuItem($item);
			if(isset($this->itemTemplate) || isset($item['template']))
			{
				$template=isset($item['template']) ? $item['template'] : $this->itemTemplate;
				echo strtr($template,array('{menu}'=>$menu));
			}
			else
				echo $menu;
	
			if(isset($item['items']) && count($item['items']))
			{
				$linkLabelWrapper=$this->linkLabelWrapper;
				$this->linkLabelWrapper=null;
				echo "\n".CHtml::openTag('ul',isset($item['submenuOptions']) ? $item['submenuOptions'] : $this->submenuHtmlOptions)."\n";
				$this->renderMenuRecursive($item['items']);
				echo CHtml::closeTag('ul')."\n";
				$this->linkLabelWrapper=$linkLabelWrapper;
			}
	
			echo CHtml::closeTag('li')."\n";
		}
	}
	/**
	 * Renders the content of a menu item.
	 * Note that the container and the sub-menus are not rendered here.
	 * @param array $item the menu item to be rendered. Please see {@link items} on what data might be in the item.
	 * @return string<i class="icon-beaker  text-white"></i>
	 * @since 1.1.6
	 */
	protected function renderMenuItem($item)
	{
		if(isset($item['url']))
		{
			$label='';
			if(isset($item['icon']))
				$label.='<i class="'.$item['icon'].'"></i>';
			if($this->linkLabelWrapper!=null || $item['active']){
				$label.='<span>'.$item['label'].'</span>';
			}else{
				$label.=$item['label'];
			}
			if(isset($item['items']) && count($item['items']) && !$this->submenu)
				$label.='<b class="caret"></b>';
			$link=CHtml::link($label,$item['url'],isset($item['linkOptions']) ? $item['linkOptions'] : array());
			return $link;
		}
		else
			return CHtml::tag('span',isset($item['linkOptions']) ? $item['linkOptions'] : array(), $item['label']);
	}
}
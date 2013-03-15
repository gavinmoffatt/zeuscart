<?php
/**
* GNU General Public License.

* This file is part of ZeusCart V4.

* ZeusCart V4 is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 4 of the License, or
* (at your option) any later version.
* 
* ZeusCart V4 is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
* 
* You should have received a copy of the GNU General Public License
* along with Foobar. If not, see <http://www.gnu.org/licenses/>.
*
*/

/**
 * Product details related  class
 *
 * @package   		Display_DProductDetail
 * @category    	Display
 * @author    		AJ Square Inc Dev Team
 * @link   		http://www.zeuscart.com
  * @copyright 	        Copyright (c) 2008 - 2013, AJ Square, Inc.
 * @version   		Version 4.0
 */

class Display_DProductDetail
{

	/**
	 * Stores the output
	 *
	 * @var array 
	 */	
	var $output = array();	
	
 	/**
	* This function is used to Display the Products
	* @param mixed $arr
	* @return string
 	*/
	function showProducts($arr)
	{
		
		$output .= '<table border="1" width="100%">';
		$output.='<th>S.no.</th><th width="100%">Product Name</th><th>Image</th>';
		
		for ($i=0;$i<count($arr);$i++)
		{
			$temp=$arr[$i]['thumb_image'];
			$img=explode('/',$temp);
			$output .= '<tr><td>'.($i+1).'</td><td ><a href=callid('.$arr[$i]['product_id'].') name="prodname"> '.$arr[$i]['title'].'</a></td>';
			$output .='<td ><img src="uploadedimages/thumb/thumb_'.$img[2].'" name="image1"  id="image1" /></td>';
			$output.='<td><input type="button" name="View"  title="Delete" value="View" onclick=callid('.$arr[$i]['product_id'].') /></td></tr>';
		}
			$output .= '</table>';
			return $output;	
	}
	
 	/**
	* This function is used to Display the Page Info
	* @param mixed $arr
	* @return string
 	*/
	function pageInfo($arr)
	{
		
		return $output.='<meta name="description" content='. $arr[0]['meta_desc'] .' /><meta name="keywords" content='.$meta_keywords.' />
		<title> '.$arr[0]['title'].' </title>';
		
			return $output;	
	}
	

 	/**
	* This function is used to Display the Product Detail Page
	* @param mixed $arr
	* @param string $diffrate
	* @param string $features
	* @param string $rating
	* @param string $breadCrumb
	* @param int $reviewCount
	* @param mixed $reviewArr
	* @param mixed $imgArr
	* @param mixed $tierArr
	* @param mixed $relArr
	* @return string
 	*/
	function productDetail($arr,$diffrate,$features,$rating,$breadCrumb,$reviewCount,$reviewArr,$imgArr,$tierArr,$relArr)
	{
	

		$result=$_SESSION['reviewResult'];
		
		$output=''.$result.'';
		

		$output.='<div class="title_fnt">
		<h1>'.$arr[0]['title'].'</h1>
		</div>
		<div id="gallery_div">
		<div class="row-fluid">';

		$output.='<div class="span6"><div class="clearfix" id="content" >
			<div class="clearfix">
			<a href="'.$arr[0]['large_image_path'].'" class="jqzoom" rel="gal1"   title="'.$arr[0]['title'].'" >
			<img src="'.$arr[0]['image'].'"  title="'.$arr[0]['title'].'"  style="border: 4px solid #ccc;">
			</a>
			</div>
			<br/>';
			
		$output.=' </div></div><div class="span6">
				<div class="gallery_detail">
				
				<ul class="detaillist">
				<li>
				<div class="ribbion_div1"><img src="assets/img/ribbion/new1.png" alt="new"></div>
				<img src="assets/img/star.png" alt="star"> <img src="assets/img/star.png" alt="star"> <img src="assets/img/star.png" alt="star"> <img src="assets/img/star.png" alt="star"> <img src="assets/img/star-gray.png" width="16" height="16" alt="star"></li>
				<li><form method="post"	action="?do=addtocartfromproductdetail&prodid='.$arr[0]['product_id'].'" name="frmcart"><table width="100%" border="0">
				<tr>
				<td align="left" valign="top"><h4>Product code: 1</h4>';
		
				if($arr[0]['soh']>0)
				{
					$output.='<span>Availability: In Stock</span>';
				}
				else
				{
					$output.='<span>Availability :  Out Of Stock </span>';
				}
		
				$output.='</td>
				<td align="left" valign="top"><h1>'.$_SESSION['currencysetting']['selected_currency_settings']['currency_tocken'].''.$arr[0]['msrp'].'</h1></td>
				</tr>
				</table></li>
						<li><h2>Quick Overview:</h2><p>This midi dress has been made from stretch jersey. The details include: a scoop neckline and sleeveless styling with an open back and latticed deatiling. The dress has been cut with a bodycon fit.</p></li>
				<li>
				<table width="100%" border="0">
		<tr>
		<td align="left" valign="top"> Quantity ';
		$output.='<select name="qty[]" style="width:60px;">';
		if($arr[0]['soh']==0)
			$output.='<option value="0">0</option>';
		
		for($s=1;$s<=$arr[0]['soh'];$s++)
			$output.='<option value="'.$s.'">'.$s.'</option>';
		$output.='</select></td>
		<td align="left" valign="top"><input type="image" name="Submit2" src="assets/img/add-to-cart-btn.png"  style="width:150px;height:40px;	display:block;cursor:pointer;border:0;outline:none;"></td>
		</tr>
		</table></form>
		
				
				</li>
			</ul>
		</div>
			
		</div> </div>
            	<div class="clear"></div><div class="buyauc_div" style="display:block;">
            	 <ul class="view_div">
                        <li ><a href="javascript:showAccnt(\'account_id\'); void(0)" class="acc_select" id="account_id1">Product Description</a></li>
                        <li ><a href="javascript:showAccnt(\'details_id\'); void(0)" class="acc_unselect" id="details_id1">Reviews</a></li>
                       
                </ul>

       
		<div style="display:block;" id="account_id" class="prd_desc">
		<p>'.$arr[0]['description'].'</p>
		</div>
           
            	 <div style="display:none;" id="details_id">';
		

             	$output.='<ul class="reviewcmd">';
		for($i=0;$i<count($reviewArr);$i++)
		{
			$img='';
			for($j=0;$j<5;$j++)
			if($j<round($reviewArr[$i]['rating']))
				$img.='<img src="assets/img/star.png" alt="star" />';
			else
				$img.='<img src="assets/img/star-gray.png"  alt="star" />';
                	$output.='<li><i class="icon-user"></i> Reviewed by :  '.$reviewArr[$i]['user_display_name'].'<span class="pull-right">'.$img.'</span>
                    <p>'.$reviewArr[$i]['review_caption'].'</p>
                    </li>';
             
		}
             	$output.='</ul>';

		if(isset($_SESSION['postvaluesreview']))
		{
			$postvalues=$_SESSION['postvaluesreview'];
			unset($_SESSION['postvaluesreview']);
		}
		else
		{
			$postvalues='';
			unset($_SESSION['postvaluesreview']);
		}
                 $output.='<form class="form-horizontal" name="frm" method=post action="">
		<div class="control-group" >
		<label class="control-label" for="inputEmail">Caption <i class="red_fnt">*</i></label>
		<div class="controls">
		<input type="text" id="caption"  name="caption" value="'.$postvalues['caption'].'">
		</div>
		</div>
		<div class="control-group">
		<label class="control-label" for="inputPassword">Review <i class="red_fnt">*</i></label>
		<div class="controls">
		<textarea rows="" cols="" name="review">'.$postvalues['review'].'</textarea>
		</div>
		</div>
		<div class="control-group">
		<label class="control-label" for="inputPassword">Rate this Product</label>
		<div class="controls">
		<img name="img1" src="assets/img/star-gray.png" title="1 star out of 5" onmouseover="fun(1)" onmouseout="fun1(1)" onclick=fun2(1)>
		<img name="img2" src="assets/img/star-gray.png" title="2 stars out of 5" onmouseover="fun(2)" onmouseout="fun1(2)" onclick=fun2(2)>
		<img name="img3" src="assets/img/star-gray.png" title="3 stars out of 5" onmouseover="fun(3)" onmouseout="fun1(3)" onclick=fun2(3)>
		<img name="img4" src="assets/img/star-gray.png" title="4 stars out of 5" onmouseover="fun(4)" onmouseout="fun1(4)" onclick=fun2(4)>
		<img name="img5" src="assets/img/star-gray.png" title="5 stars out of 5" onmouseover="fun(5)" onmouseout="fun1(5)" onclick=fun2(5)>
		<input type=hidden name=hidRate>
		</div>
		</div>
		<div class="control-group">
		<label class="control-label" for="inputEmail">Enter the code in the box below</label>
		<div class="controls">
		<input type="text" id="txtcaptcha" name="txtcaptcha" >
		</div>
		</div>
		<div class="control-group">
		&nbsp;
		<div class="controls">
		
		<img src="?do=captcha"  id="captcha" name="captcha" width="90" height="45"/><span class="featureTXT" style="padding:0px;font-size:11px"> <a href="#reg" onclick="javascript:shuffle();" >Try another one</a></span></div>
		</div>
		<div class="control-group">
		<div class="controls">
			<button type="submit" class="btn btn-danger" name="reviewbutton" id="reviewbutton" >Submit Review</button>
		</div>
		</div>
		</form>
		</div>
		</div>';

		return $output;	
	}
 	/**
	* This function is used to Display the Review Rating
	* @param mixed $arr
	* @return string
 	*/
	function reviewRating($arr)
	{
		
		$rating=ceil($arr);
		$ratepath='';
		for($r1=0;$r1<5;$r1++)
		{
			if($r1<$rating)
				$ratepath.='<img src="images/starf.png">';
			else
				$ratepath.='<img src="images/stare.png">';							
		}	
		return $ratepath;
	}
 	/**
	* This function is used to Display the breadCrumb
	* @param mixed $arr
	* @return string
 	*/
	function breadCrumb($arr)
	{	
		
		$bread='<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="resultDETAILS">
              <tr>
                  <td align="left" scope="col"><a href="?do=indexpage">Home</a> > <a href="?do=featured&action=showmaincatlanding&maincatid='.$arr[0]['maincatid'].'">'.$arr[0]['Category'].'</a> > <a href="?do=featured&action=showfeaturedproduct&subcatid='.$arr[0]['category_id'].'">'.$arr[0]['SubCategory'].'</a> > '.$arr[0]['title'].' </a></td>
              </tr>
          </table>';
		return $bread;
	}

 	/**
	* This function is used to Display the attribute List of Product
	* @param mixed $arr
	* @return string
 	*/
	function attributeList($arr)
	{
		for ($i=0;$i<count($arr);$i++)
		{
			if($i % 2 == 0)
			{
				$classval = 'class="odd"';
				$classtd='class="label"';
			}	
			else
			{
				$classval = 'class="even"';
				$classtd='class="label"';
			}	
				
			$output .= '<tr '.$classval.'><td '.$classtd.'>'.$arr[$i]['attrib_name'].'</td><td '.$classval.'>'.$arr[$i]['attrib_value'].'</a></td></tr>';
		}
			$output .= '</tbody></table></td><tr><td width="3%" >&nbsp;</td></tr></table>';
			return $output;	
	}
	
 	/**
	* This function is used to Display the related Products
	* @param mixed $arr
	* @param int $flag
	* @param array $r
	* @return string
 	*/
	function relatedProducts($arr,$flag,$r)
	{
		
		if($flag==1)
			$output='<br/><span class="head_text">Related Products </span><div id="middle_details"><div id="product_tbbg_details">
			<table width="100%" border="0" cellpadding="2" cellspacing="2">';
		$loop=0;$j=0;
	 $cnt=count($arr);
	if(($cnt>0))
	{
		for($i=0;$i<$cnt;$i++)
		{
						$product_id=$arr[$i]['product_id'];
						$sku=$arr[$i]['sku'];
						$title=$arr[$i]['title'];
						$description=$arr[$i]['description'];
						$brand=$arr[$i]['brand'];
						$price=number_format($arr[$i]['price'],2);
						$msrp=number_format($arr[$i]['msrp'],2);
						$weight=$arr[$i]['weight'];
						$dimension=$arr[$i]['dimension'];
						$thumb_image=$arr[$i]['thumb_image'];
						$image=$arr[$i]['image'];
						$img=explode('/',$thumb_image);
						$shipping_cost=$arr[$i]['shipping_cost'];
						$status=$arr[$i]['status'];
						$tag=$arr[$i]['tag'];
						$pat="images/products/";
						
						if($loop==3)
						{
							$output.='</tr>';
							$loop=0;
						}		
						if($loop==0)
							$output.='<tr>';
						
						$output.="<td id='product_tbbg'><table width='95%' border='0' align='center' cellpadding='2' cellspacing='2'><tr><td><a href='?do=prodetail&action=showprod&prodid=".$product_id."'>";
						if(file_exists($thumb_image))
						{
						  $output.='<img src="'.$thumb_image.'" width="90" height="67"  border="0" />';
						}
						else
						{
							$output.='<img border="0" width="90" height="67" src="images/noimage.jpg"/>';
						} 
					
        $output.="</a></td>
        </tr>
		 <tr>
          <td class='text'><a href='?do=prodetail&action=showprod&prodid=".$product_id."'>$title</a></td>
        </tr>
		<tr>
          <td align='left' class='rate_text'>".$r[$j]['msrp']."</td>
        </tr>
		<tr>
          <td align='left' class='addtowishlist'><a href='?do=wishlist&action=viewwishlist&id=".$product_id."'>Add to Wishlist</a> </td>
        </tr>
        <tr>
          <td align='left' class='addtocompare'><a href='?do=compareproduct&action=addtocompareproduct&prodid=".$product_id."'>Add to Compare</a></td>
        </tr>
		";
			
			$output.="</table></td>	";
		
			$loop++;$j++;
			}
			$output.='</table></div>';
			
		}
		else
			$output='No Records Found';
		return $output;
	}
	
 	/**
	* This function is used to Display the Related Products
	* @param mixed $arr
	* @return string
 	*/
	function dispRelatedProduct($arr)
	{
		if(count($arr > 0))
		{
			$output='<table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td><div class="heading"><span class="headingTXT">Browse Similar Items</span></div></td>
			      </tr>
			      <tr>
				<td class="border1">
					<ul class="categoriesList">';
			for($i=0;$i<count($arr);$i++)
			{
				$output.='<li><a href="?do=prodetail&action=showprod&prodid='.$arr[$i]['product_id'].'">'.$arr[$i]['title'].'</a></li>';
			}
			$output.='</ul>		</td>
			      </tr>
			      <tr>
				<td valign="top" class="roundbox1_bottom" ><!--<img src="images/bot.gif" alt="" width="189" height="4" />-->&nbsp;</td>
			      </tr>
			    </table>';
		}
		return $output;
	}
	
 	/**
	* This function is used to Display the Product in Large View
	* @param mixed $arr
	* @param int $paging
	* @param int $prev
	* @param int $next	
	* @param int $val
	* @return string
 	*/
	function showLargeview($arr,$paging,$prev,$next,$val)
	{
	
		$output='
		<table width="100%" border="0" cellspacing="0" cellpadding="0" height=350px>
		<tr>
		<td valign="top" class="itemDETAIL" align=center>
		<ul>'.$arr['title'].'
		</ul></td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td align=center>
		<img src="'.$arr['image_path'].'" border="1"  width="213" height="153" />
		</td></tr>
		<tr align="right"><td class="content_list_footer" >'.' '.$prev.' ';
					for($i=1;$i<=count($paging);$i++)
					 $pagingvalues .= $paging[$i]."  ";
							$output .= $pagingvalues.' '.$next.'</td></tr>
		</table>';
		 return $output;
	}

	/**
	 * This function is used to display the category list .
	 *
	  * @param   array  	$arr	array of items
	 * 
	 * @return string
	 */

	function showCategoryTree($arr)
	{
		
		$output='<ul id="tree" class="nicetree">';

		for($i=0;$i<count($arr);$i++)
		{


			$output.='<li class="blue active withsubsections">
				<a href="#" class="">'.$arr[$i]['category_name'].'</a>';
				$query = new Bin_Query(); 
				$sql = "SELECT * FROM `category_table` WHERE category_parent_id =".$arr[$i]['category_id']." AND  sub_category_parent_id =0 AND category_status =1 order by category_name limit 16";
				$query->executeQuery($sql);
				$count=count($query->records);
				if($count>0)
				{	
					$records=$query->records;
					$output.='<ul class="subsections" style="display: none;">';
					for($j=0;$j<$count;$j++)
					{
						$output.='<li><a href="#">'.$records[$j]['category_name'].'</a>';


							$sqlsub="SELECT * FROM category_table WHERE sub_category_parent_id='".$records[$j]['category_id']."'";
							$objsub=new Bin_Query();
							$objsub->executeQuery($sqlsub);
							$recordssub=$objsub->records;
							$output.='<ul class="subsections" style="display: none;">';
							for($k=0;$k<count($recordssub);$k++)
							{

							$output.='<li>
								<a href="#">'.$recordssub[$k]['category_name'].'</a>
								</li>';
										
							}
									$output.='</ul>




						</li>';
					}
					$output.='</ul>';
				}
						
				$output.='</li>';
						

			}

		$output.='</ul>';

		return $output;


	}
	/**
	* This function is used to get the pop up  of image of product 
 	* @param array $records
 	* @return string
	*/
	function showPopupProducts($arr)
	{
		
		 $output='<div class="container">
			<div class="row-fluid">
				<div class="span9">
			<div class="title_fnt">
			<h1><a href="?do=prodetail&action=showprod&prodid='.$arr[0]['product_id'].'" target="_parent">'.$arr[0]['title'].'</a></h1>
			</div>
			<div id="gallery_div">
				<div class="row-fluid">';
				$output.='<div class="span6"><div class="clearfix" id="content" >
			<div class="clearfix">
			<a href="'.$arr[0]['large_image_path'].'" class="jqzoom" rel="gal1"   title="'.$arr[0]['title'].'" >
			<img src="'.$arr[0]['image'].'"  title="'.$arr[0]['title'].'"  style="border: 4px solid #ccc;">
			</a>
			</div>
			<br/>';
				$output.=' </div></div><div class="span6">
				<div class="gallery_detail">
				
				<ul class="detaillist">
				<li>
			
				<img src="assets/img/star.png" alt="star"> <img src="assets/img/star.png" alt="star"> <img src="assets/img/star.png" alt="star"> <img src="assets/img/star.png" alt="star"> <img src="assets/img/star-gray.png" width="16" height="16" alt="star"></li>
				<li><table width="100%" border="0">
		<tr>
		<td align="left" valign="top"><h4>Product code: 1</h4><span>Availability: In stock</span></td>
		<td align="left" valign="top"><h1>'.$_SESSION['currencysetting']['selected_currency_settings']['currency_tocken'].''.$arr[0]['msrp'].'</h1></td>
		</tr>
		</table></li>
		<li><h2>Quick Overview:</h2><p>This midi dress has been made from stretch jersey. The details include: a scoop neckline and sleeveless styling with an open back and latticed deatiling. The dress has been cut with a bodycon fit.</p></li>
		<li><form method="post"	action="?do=addtocartfromproductdetail&prodid='.$arr[0]['product_id'].'" name="frmcart" target="_parent">
		<table width="100%" border="0">
		<tr>
		<td align="left" valign="top"> Quantity ';
		$output.='<select name="qty[]" style="width:60px;">';
		if($arr[0]['soh']==0)
			$output.='<option value="0">0</option>';
		
		for($s=1;$s<=$arr[0]['soh'];$s++)
			$output.='<option value="'.$s.'">'.$s.'</option>';
		$output.='</select></td>
		<td align="left" valign="top"><input type="image" name="Submit2" src="assets/img/add-to-cart-btn.png"  style="width:150px;height:40px;	display:block;cursor:pointer;border:0;outline:none;"></td>
		</tr>
		</table>
		</form>
		</li>
		</ul>
		</div>
		</div>
		</div>
		<div class="clear"></div>
		</div>
		</div>
		</div>
		</div>';

	return $output;

	}
	
}	
?>
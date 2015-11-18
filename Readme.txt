Please follow link to get JM Product List user guide

http://www.joomlart.com/forums/showthread.php?t=29760

#How to use:

<!--Static block with ajax load more-->
{{block  type="joomlart_jmproducts/list" name="jmproducts.ajax.loadmore" title="JM Products with ajax load more" ajaxloadmore=1}}

<!--Static block normal-->
{{block  type="joomlart_jmproducts/list" name="jmproducts.normal" title="JM Products normal"}}

<!--Static block with accordion slider-->
{{block  type="joomlart_jmproducts/list" name="jmproducts.accordion" title="JM Products With Accordion Slider" accordionslider=1 qty=5 qtyperpage=5 perrow=5 max=150}}

<!--Static block with slider -->
{{block type="joomlart_jmproducts/list" name="jmproduct.slider1" title="JM Products With Slider" show=1 mode="latest" display_style="slider" slide_auto=1 qty=10 qtyperpage=10 perrow=5}}

#Specify transition
#Transitions Options: rtl,ltr,fade

{{block type="joomlart_jmproducts/list" name="jmproduct.slider2" title="JM Products With Slider" show=1 mode="latest" display_style="slider" slide_auto=1 slide_transition="ltr" qty=10 qtyperpage=10 perrow=5}}


#Other way:
<!--Call from layout-->
<block type="joomlart_jmproducts/list" name="jmproducts.list1">
    <action method="setData">
        <name>title</name>
        <value>Jm Products </value>
    </action>
</block>

<!--Call from layout with ajax load more-->
<block type="joomlart_jmproducts/list" name="jmproducts.list1">
    <action method="setData">
        <name>title</name>
        <value>Jm Products </value>
    </action>
    <action method="setData">
        <name>ajaxloadmore</name>
        <value>1</value>
    </action>
</block>

<!--Call from layout with accordion slider-->
<block type="joomlart_jmproducts/list" name="jmproducts.accordion">
    <action method="setData">
        <name>title</name>
        <value>Jm Products with accordion slider </value>
    </action>
    <action method="setData">
        <name>accordionslider</name>
        <value>1</value>
    </action>
</block>


List support Params:

[show] => 1
[template] => joomlart/jmproducts/list.phtml
[viewall] => 0 (Set/not set view all link in the Block?)
[mode] => latest
[title] => JM Products

[catsid] =>
or
[category_ids] => 

//Example: category_ids="4,5"

[productsid] => 
[qty] => 36
[qtytable] => 8
[qtytableportrait] => 4
[qtymobile] => 5
[qtymobileportrait] => 2
[qtyperpage] => 10
[qtyperpagetable] => 6
[qtyperpagemobile] => 5
[perrow] => 3
[perrowtablet] => 3
[perrowmobile] => 3
[ajaxloadmore] => 0
[ajaxloadmoremobile] => 0
[ajaxloadmoretable] => 1
[accordionslider] => 0
[width] => 150
[height] => 150
[max] => 0 (Product Description max length)
[random] => 0



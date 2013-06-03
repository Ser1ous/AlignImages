############################################################################################
English manual
############################################################################################
AlignImage is a component which uses for displaying your necessary pictures in the same.
AligeImage is the component that is designed to show you the required images in the same 
format as provides search results of Google. This addition can be combined  with the 
components of Gallery and GetResourse and FileDir.
############################################################################################
If you have any questions, please email to serious_2008@mail.ru 
Demo Site: http://demo.ser1ous.ru
Attention! Before using make sure that you set up IMAGEMAGICK application for PHP.
############################################################################################
How to use AlignImag with Gallery
Add snippet AlignImage
Example
[[AlignImage?
 &snippet=`Gallery`
 &lineLimit=`5`
 &limit=`40`
 &lineWidth=`563`
 &album=`Gallery`
]]
&snippet - the name of the snippet, the default Getresource
&lineLimit - the number of images in a row
&limnt - the number of images
&lineWidth - the number of pixels in width for the gallery
&album - an album name 
############################################################################################
How to use AligImag with GetRecource
Add snippet AlignImage
Example
[[AlignImage?
  &snippet=`getResources`
  &parents=`3`
  &sortby=`{"menuindex":"ASC"}`
  &lineLimit=`4`
  &limit=`40`
  &lineWidth=`563`
  &tvPrefix = `tv.`
]]
&snippet - the name of the snippet, the default GetRecource
&lineLimit - the number of images in a row
&limnt - the number of images
&lineWidth - the number of pixels in width for the gallery
&parents - parenting resource identifier list, separated by commas. Use -1 to avoid parental resources ..
&sortby - Any resource box (with the exception of template variables) to sort.
&showHidden - Show hide in meny or no
############################################################################################
How to use AligImag with FileDir
Add snippet AlignImage
Example
[[AlignImage?
  &snippet=`filedir`
  &dir=`img/`
  &lineLimit=`4`
  &limit=`40`
  &lineWidth=`563`
]]
&snippet - the name of the snippet, the default GetRecource
&lineLimit - the number of images in a row
&limnt - the number of images
&lineWidth - the number of pixels in width for the gallery
&dir - path to the folder, the default assets/
############################################################################################
Advanced settings.
############################################################################################
&tpl_in - the name of the chunk, in which the image is placed
&image_absolute - this url to a reduced image
&id - id image
&album - the album title
&origin - a reference to the original image
& tpl_out - Name chunk of that is wrapped up our result
############################################################################################
For use with the Bootstrap Gallery add any calls
& tpl_in = `tpl.galAlignImage_bootstrap`
& tpl_out = `tpl.outAlignImage_bootstrap`
############################################################################################
############################################################################################
Русский язык
############################################################################################
AligImage - это компонент, который предназначен для отображения необходимых вам картинок 
в том же формате,  в котором и выдаёт результаты поиск Google. 
Это дополнение может работать совместно с компонентами Gallery и Getresource. 
############################################################################################
По всем вопросам и замечаниям обращаться на email: serious_2008@mail.ru
Demo Site: http://demo.ser1ous.ru
Внимание! Перед использованием убедитесь что у вас установлено дополнение для php -  imagemagick
############################################################################################
Использование с Gallery
Добавляем Сниппет(Snippet) AlignImage

Пример: 
[[AlignImage?
  &snippet=`Gallery`
  &lineLimit=`5`
  &limit=`40`
  &lineWidth=`563`
  &album=`Gallery`
]]

&snippet - название сниппета, по умолчанию GetRecource
&lineLimit - количество изображений в строке
&limnt - количество изображений
&lineWidth - количество пикселей в ширину  для галереи
&album - имя альбома
############################################################################################
Использование с Getresource
Добавляем Сниппет(Snippet) AlignImage

Пример: 
[[AlignImage?
  &snippet=`getResources`
  &parents=`59`
  &sortby=`{"menuindex":"ASC"}`
  &lineLimit=`4`
 &limit=`40`
  &lineWidth=`563`
]]

&snippet - название сниппета, по умолчанию GetRecource
&lineLimit - количество изображений в строке
&limnt - количество изображений
&lineWidth - количество пикселей в ширину  для галереи
&parents - Список идентификаторов родительских ресурсов, разделенных запятыми. 
&sortby - Любое поле ресурса (за исключением переменных шаблона) для сортировки.
&showHidden - Показывать скрытые

############################################################################################
Использование с FileDir
Добавляем Сниппет(Snippet) filedir

Пример: 
[[AlignImage?
  &snippet=`filedir`
  &dir=`img/`
  &lineLimit=`4`
  &limit=`40`
  &lineWidth=`563`
]]


&snippet - название сниппета, по умолчанию GetRecource
&lineLimit - количество изображений в строке
&limnt - количество изображений
&lineWidth - количество пикселей в ширину  для галереи
&parents - Список идентификаторов родительских ресурсов, разделенных запятыми. Используйте -1 для исключения родительских ресурсов..
&sortby - Любое поле ресурса (за исключением переменных шаблона) для сортировки.
&dir - адрес папки, по умолчанию assets/

############################################################################################
Дополнительные параметры.
&tpl_in - указывается имя чанка, в которое помещается изображение
&image_absolute - это урл до уменьшенной картинки
&id - id изображения
&album - название альбома
&origin - ссылка на оригинальное изображение
&tpl_out - Имя чанка, во что обёртывается наш результат
############################################################################################
Для использования вместе с Bootstrap Gallery добавить в любой из вызовов
&tpl_in=`tpl.galAlignImage_bootstrap`
&tpl_out=`tpl.outAlignImage_bootstrap`
############################################################################################
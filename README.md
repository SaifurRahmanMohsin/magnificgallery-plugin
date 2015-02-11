# [Magnific-Gallery](https://github.com/SaifurRahmanMohsin/Magnific-Gallery) #
Gallery plugin for October CMS based on Magnific Popup

## Installation ##
Until this plugin is added to the market place, you will have to use the following method to update it:
```
cd /your/october/project/plugins/folder
mkdir -p mohsin
cd $_
wget https://github.com/SaifurRahmanMohsin/Magnific-Gallery/archive/master.zip
unzip master.zip
rm $_
mv Magnific-Gallery-master txt
```
Now goto your backend /backend/system/updates URL i.e. the Updates page in the Settings panel. Click `Check for updates` and Force update. This will generate the tables necessary for the plugin to work. You have now installed magnific gallery!

## Quick Start ##
Add the component to your project. Choose `Gallery` from the top bar in the backend and create a new gallery. Upload the photos which you would like to display on your web app. Now in the CMS controller screen add the component provided `Magnific Gallery` to your page and choose the gallery from the component properties. You can also set the preferred height and width of the thumbnails as per your choice.

## Credits ##

#### Magnific Popup ####
[Dmitry Semenov](http://dimsemenov.com/plugins/magnific-popup/) for making this awesome component.

#### The developers of October CMS ####
[Alexey Bobkov and Samuel Georges](http://octobercms.com) for making an even more awesome CMS to port the component in.

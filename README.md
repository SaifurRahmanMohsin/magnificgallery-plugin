# [Magnific-Gallery](https://github.com/SaifurRahmanMohsin/Magnific-Gallery) #
Responsive Gallery plugin for October CMS based on Magnific Popup

## Installation ##
#### MarketPlace Installation ####
You can use the plugin code **Mohsin.MagnificGallery** in your October backend to get this plugin. Enjoy!!!

#### Manual Installation ####
Some advanced users might prefer to use manually install the plugin. This can be done using the command line. CD into your OctoberCMS project folder and paste these commands. It will execute one after another:
```
[ -f artisan ] && cd plugins
mkdir -p mohsin && cd $_
wget https://github.com/SaifurRahmanMohsin/Magnific-Gallery/archive/master.zip
[ -f master ] && unzip master || unzip master.zip && rm $_
mv Magnific-Gallery-master magnificgallery && cd $_

```
Logout from your backend and login again. This will create the necessary tables for the plugin to work. You have now installed **Magnific-Gallery**! Enjoy!!!

## Quick Start ##
After the plugin is installed choose `Gallery` in the Settings page under the CMS category and create a new gallery. Upload the photos which you would like to display on your web app. Now, in the CMS page add the component provided `Magnific Gallery` to your page by dragging it into the page and choose the desired gallery from the component properties. You can also set the preferred height and width of the thumbnails as per your choice.

## Thanks ##

#### Magnific Popup ####
[Dmitry Semenov](http://dimsemenov.com/plugins/magnific-popup/) for Magnific-Popup.

#### October CMS ####
[Alexey Bobkov and Samuel Georges](http://octobercms.com) for OctoberCMS.
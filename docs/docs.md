# Introduction to Wordpress

The PBT site is built on the [Wordpress](https://wordpress.org/) CMS. There is plenty of [documentation](https://codex.wordpress.org/) online for this tool. It is widely used and easily learned.

Wordpress allows us to post, update, edit, and publish online content. The Wordpress Content Management System provides an interface around which to do this.

#Images
Images are uploaded through Wordpress media browser. These images are searchable and sortable and include captioning, alt text, and resizes. There is no need to upload the same image multiple times and there is no reason to drastically resize images for upload.

Here are the standards:

####Resizing:
Image resizing should be done prior to upload. There is no need to upload 5MB images to our site. Wordpress automatically creates different sizes of the same image for use in different places of the site.

For example: An image originally sized 2000x1200 will get resized and cropped to 300x300 for thumbnail, 400x200 for the post-thumbnail, 1000px width for large sizes and 1600px width for featured sizes.

#####Size: **Max width 2400px**, **Approx 700kb**

#####Resolution: **Don't Change from default image setting**

#####Credits:
Photo credits are generally located at the top of a post (for web stories) or bottom of a post (for blogs). When there is more than one photographer/videographer, credits for specific photos should be in parentheses, name only. If we’re crediting someone outside of PBT, use name, organization format. Ex: (Michael Forsberg) Ex. (Chris Helzer, TNC)

#Video
Videos are hosted on other services like Vimeo. Upload video prior to creating post in CMS.

Video behaves slightly different online than images. We will be using a short code to embed video.

####Embedding
The base line embed code is

[embed_video vimeo_id="" caption=""]

where between the 'src' quotes is the complete url for the video source and between 'caption' quotes is a video caption.

#####Options:
* **vimeo_id=""** 		*Ex. vimeo_id="124967113"*
* **src=""** 			*Ex. src="https://www.youtube.com/embed/58-atNakMWw"* **OR**
* **caption=""** 		*(optional)*
* **aspect_ratio=""** 	*(optional) Ex. aspect_ratio="timelapse" for 3x2 crop*
* **size=""**			*(optional) Ex. size="aside", defaults to featured*
* **side=""**			*(optional) Ex. size="left" or size="right", used only when size="aside"

######Examples:

Video from Vimeo:

[embed_video vimeo_id="124967113" caption="Crane tourists visit Audubon's Rowe Sanctuary. (Kat Shiffler & Mariah Lundgren)"]

Timelapse from Vimeo formatted aside:

[embed_video vimeo_id="124652660" aspect_ratio="timelapse" size="aside" caption="Jack Creek is a super cool mountain stream in Colorado."]

#Responsive iFrames

Responsive iframes are externally added pages that provide opportunity for more interactive contented embedded straight into the CMS. This shortcode utilizes NPR's Pym.js.

####Embedding
The base line embed code is

[embed_iframe id="" src=""]

#####Options:
* **src=""** 		*Ex. src="http://projects.plattebasintimelapse.com/assets/static/pages/historical-news-lincoln-water/"*
* **id=""** 		*Ex. src="newspapers", it must be unique per page
* **size=""**		*(optional) Ex. size="aside", defaults to featured*
* **side=""**		*(optional) Ex. size="left" or size="right", used only when size="aside"

######Examples:

An aside module of newspaper clipppings:

[embed_iframe id="newspaper" src="http://projects.plattebasintimelapse.com/assets/static/pages/historical-news-lincoln-water/" size="aside" side="left"]

Or a featured interactive chart:

[embed_iframe id="lincoln-water" src="http://projects.plattebasintimelapse.com/assets/static/pages/lincoln-water/"]

#Gallery
A Gallery allows you to upload multiple images together, to be viewed in a Lightbox.

Simple Add Media and click 'Create Gallery' on the side panel.









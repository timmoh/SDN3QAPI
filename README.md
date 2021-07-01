PHP-API-Connector (for PHP 7+)



**1.0 Welcome**

✅ GET /api/v2/ You can test Authentication with this function

**1.1 ApiKey**

✅ DELETE /api/v2/apikey You can delete the Authentication Key (APIKEY) for a given user by Username / Password with this function

✅ GET /api/v2/apikey You can get the Authentication Key (APIKEY) for a given user by Username / Password with this function

**2.0 Projects**

✅ GET /api/v2/projects Return a collection of available Projects

✅ POST /api/v2/projects Create a new Project

✅ DELETE /api/v2/projects/{ProjectId} Delete a Project by Id

✅ GET /api/v2/projects/{ProjectId} Return Project

✅ PUT /api/v2/projects/{ProjectId} Change proprties of Project

**2.2 Project FileEncoders**

GET /api/v2/projects/{ProjectId}/fileencodersettings Return the global Settings for FileEncoding in a Video on Demand Project

PUT /api/v2/projects/{ProjectId}/fileencodersettings Set the global Settings for FileEncoding in a Video on Demand Project

PUT /api/v2/projects/{ProjectId}/fileencodersettings/watermarkpicture Put a WatermarkPicture

LINK /api/v2/projects/{ProjectId}/fileencodersettings/fileformat/{FileFormatId} Add (link) FileFormat to FileEncoderSettings

UNLINK /api/v2/projects/{ProjectId}/fileencodersettings/fileformat/{FileFormatId} Remove (unlink) FileFormat from FileEncoderSettings

✅ GET /api/v2/projects/{ProjectId}/fileformatsettings Return all global FileFormatSettings of a Video on Demand Project

✅ GET /api/v2/projects/{ProjectId}/fileformatsettings/{FileFormatId} Return a FileFormatSetting of a Video on Demand Project

✅ PUT /api/v2/projects/{ProjectId}/fileformatsettings/{FileFormatId} Set a FileFormatSetting of a Video on Demand Project

**2.3 Project FileEncoderPipeline**

GET /api/v2/projects/{ProjectId}/pipeline Return the Assets in the Encoding Pipeline of a Video on Demand Project.

GET /api/v2/projects/{ProjectId}/pipeline/{FileId} Return the Pipeline Asset of the File (specified by FileId) of a Video on Demand Project.

PUT /api/v2/projects/{ProjectId}/pipeline/{FileId} Set the Pipeline Asset Settings for Encoding of the File (specified by FileId) of a Video on Demand Project

LINK /api/v2/projects/{ProjectId}/pipeline/{FileId}/fileformat/{FileFormatId} Add (link) FileFormat to Pipeline Asset

UNLINK /api/v2/projects/{ProjectId}/pipeline/{FileId}/fileformat/{FileFormatId} Remove (unlink) FileFormat from Pipeline Asset

PUT /api/v2/projects/{ProjectId}/pipeline/{FileId}/watermarkpicture Put a WatermarkPicture to Pipeline Asset

**2.4 Project Usage**

GET /api/v2/projects/{ProjectId}/usage Return project used resources. Parameters: 'Start' [YYYY-MM-DD] Reporting period from, 'End' [YYYY-MM-DD] Reporting period to, 'Resolution' ['month'|'day'] Detail of the data.

**3.0 Channels**

✅ GET /api/v2/channels Return a collection of available Channels

✅ GET /api/v2/channels/{ChannelId} Return a Channel

**3.1 Channel Picture**

✅ GET /api/v2/channels/{ChannelId}/picture Return Channel Picture

✅ PUT /api/v2/channels/{ChannelId}/picture Put a Channel Picture

**3.2 Channel Metadata**

✅ GET /api/v2/channels/{ChannelId}/metadata Return Metadata of a Channel

✅ PUT /api/v2/channels/{ChannelId}/metadata Change Channel Metadata

✅ PUT /api/v2/channels/{ChannelId}/metadata/boardpicture Put a ChannelMetadata BoardPicture

✅ PUT /api/v2/channels/{ChannelId}/metadata/creditspicture Put a ChannelMetadata CreditsPicture

**3.3 Channel Input**

✅ GET /api/v2/channels/{ChannelId}/input Return Input of a Channel

✅ PUT /api/v2/channels/{ChannelId}/input Change Channel Input

**3.4 Channel Output**

✅ GET /api/v2/channels/{ChannelId}/output Return Output URIs of a Channel

**3.5 Channel Embed**

✅ GET /api/v2/channels/{ChannelId}/embed Return the Embed Codes of a Channel

✅ GET /api/v2/channels/{ChannelId}/embedstate Return the Playout State of Channels Embed Code

✅ PUT /api/v2/channels/{ChannelId}/embedstate Change Playout State of Channels Embed Code

**3.6 Channel Transcoder**

✅ GET /api/v2/channels/{ChannelId}/formats Return available Channel Transcoder Formats

✅ LINK /api/v2/channels/{ChannelId}/formats/{ChannelFormatId} Add (link) a ChannelFormat to a Channel and create a new Transcoder

✅ UNLINK /api/v2/channels/{ChannelId}/formats/{ChannelFormatId} Remove (unlink) a ChannelFormat from a Channel and remove the Transcoder

✅ GET /api/v2/channels/{ChannelId}/transcoders Return enabled Channel Transcoders


**3.7 Channel Distribution**

✅ GET /api/v2/channels/distributions Return enabled Channel Distributions

✅ POST /api/v2/channels/{ChannelId}/distributions Create a new ChannelDistribution

✅ DELETE /api/v2/channels/{ChannelId}/distributions/{ChannelDistributionId} Delete a ChannelDistribution by Id

✅ GET /api/v2/channels/{ChannelId}/distributions/{ChannelDistributionId} Return a ChannelDistribution by Id

✅ PUT /api/v2/channels/{ChannelId}/distributions/{ChannelDistributionId} Edit a ChannelDistribution

✅ PUT /api/v2/channels/{ChannelId}/distributions/{ChannelDistributionId}/StartStop Starts or stops a ChannelDistribution

**3.7 Channel Purge Timeshift**

✅ GET /api/v2/channels/{ChannelId}/timeshift/purge Creates a Job to Purge Timeshift

**4.0 Files**

✅ GET /api/v2/projects/{ProjectId}/files Return a collection of Files in Project.

✅ POST /api/v2/projects/{ProjectId}/files Create a new File Entity and return the File Upload URI in the Location Header

✅ DELETE /api/v2/projects/{ProjectId}/files/{FileId} Delete a File by Id

✅ GET /api/v2/projects/{ProjectId}/files/{FileId} Return a File by Id

**4.1 File Metadata**

✅ GET /api/v2/projects/{ProjectId}/files/{FileId}/metadata Return Metadata of a File

✅ PUT /api/v2/projects/{ProjectId}/files/{FileId}/metadata Change Metadata of a File

**4.2 File Metadata Categories**

LINK /api/v2/projects/{ProjectId}/files/{FileId}/metadata/category/{CategoryId} Add (link) Category to File Metadata

UNLINK /api/v2/projects/{ProjectId}/files/{FileId}/metadata/category/{CategoryId} Remove (unlink) Category from File Metadata

**4.3 File Metadata Videotype**

LINK /api/v2/projects/{ProjectId}/files/{FileId}/metadata/videotype/{VideotypeId} Add (link) Videotype to File Metadata

UNLINK /api/v2/projects/{ProjectId}/files/{FileId}/metadata/videotype/{VideotypeId} Remove (unlink) Videotype from File Metadata

**4.4 File Playout**

✅ GET /api/v2/projects/{ProjectId}/files/{FileId}/playouts Return Playout Id's of a file

✅ GET /api/v2/projects/{ProjectId}/files/{FileId}/playouts/default/embed Return the Embed Codes of the default Playout of a File

✅ GET /api/v2/projects/{ProjectId}/files/{FileId}/playouts/{PlayoutId}/embed Return the Embed Codes of the Playout of a File

**4.5 File Output**

✅ GET /api/v2/projects/{ProjectId}/files/{FileId}/output Return Output URIs of a file

**4.6 File Picture**

✅ GET /api/v2/projects/{ProjectId}/files/{FileId}/pictures Return Pictures of a file

✅ POST /api/v2/projects/{ProjectId}/files/{FileId}/pictures Create a new FilePicture and set it as Standard Picture

✅ GET /api/v2/projects/{ProjectId}/files/{FileId}/pictures/standard Return the standard (default) Picture of a file

✅ DELETE /api/v2/projects/{ProjectId}/files/{FileId}/pictures/{FilePictureId} Delete this FilePicture

✅ PUT /api/v2/projects/{ProjectId}/files/{FileId}/pictures/{FilePictureId}/standard Set this as Standard (default) FilePicture

**5.0 Categories**

GET /api/v2/categories Return a collection of available Categories

GET /api/v2/categories/{CategoryId} Return a Category

PUT /api/v2/categories/{CategoryId} Change proprties of Category

PUT /api/v2/categories/{CategoryId}/picture Put a Category Picture

**7.0 Reporting - Project**

GET /api/v2/reporting/projects/{ProjectId}/views Return Reportings for a Project

**7.1 Reporting - File**

GET /api/v2/reporting/projects/{ProjectId}/fileviews Return FileView Reportings for a Vod Project

GET /api/v2/reporting/projects/{ProjectId}/fileviews/{FileId} Return FileView Reportings for a File of a Vod Project

**7.2 Reporting - User**

GET /api/v2/reporting/projects/{ProjectId}/fileuserviews Return FileView Reportings from Users for a Vod Project

GET /api/v2/reporting/projects/{ProjectId}/fileuserviews/{UserToken} Return FileView Reportings from a User identified by UserToken of a Vod Project

**7.3 Reporting - Country, Device**

GET /api/v2/reporting/projects/{ProjectId}/countries Return Reportings about Views from Countries for a Project

GET /api/v2/reporting/projects/{ProjectId}/devices Return Reportings about Views from Countries for a Project

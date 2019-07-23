# PHPFILEUPLOAD
Upload via php using w3school php image uploader script  
https://www.w3schools.com/php/php_file_upload.asp


## Install?
```
git clone
cd phpfileupload
mkdir uploads
```

## Endpoint /index.php
HTTP | Requirement | Description
---|---|---
GET | - | Appname
POST | Body: file, type. Basic Auth: user, pw | Upload a image

### POST /index.php
Body: form-multipart
```
type: 'upload',
file: <file JPG, JPEG, GIF, PNG>
```
Auth: Basic Auth
```
username: 'capung',
password: '999'
```
Headers: 
```
Content-Type: "multipart/form-data"
```
Example Response:
```
{
  "status": 500,
  "filename": "120529.jpg",
  "url": "uploads\/120529.jpg",
  "message": "The file 120529.jpg has been uploaded."
}
```


fariswd  
2019  
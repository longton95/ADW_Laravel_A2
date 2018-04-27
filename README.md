# Advanced Web Programming Assignment 2

### Setup and running localy
##### Prerequisites
1. Docker
2. AWS keys
3. Google API keys
4. GitHub API Keys
5. Twitted API keys

##### Running
You will need to add you keys to the .env file before running.
```
AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=
AWS_BUCKET=

GOOGLE_ID=
GOOGLE_SECRET=
GOOGLE_REDIRECT=

GITHUB_ID=
GITHUB_SECRET=
GITHUB_REDIRECT=

TWITTER_ID=
TWITTER_SECRET=
TWITTER_REDIRECT=
```
Docker will automaticaly set up the rest of the enviroment on build by running 
```
docker-compose up --build
```
This command will build a php linux image, nginx image and a mongoDB image then the site will be accessable at `localhost`

### Features

* Docker 
* MongoDB
* Social Login
* Gravatar
* Cloud image upload (s3)
* Live API's
* Charts.js with data from the past 30 days
* Mail sent on register 
* Multi Roles
* Probably more but I forgot :)

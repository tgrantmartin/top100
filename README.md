# Top 100 Challenge
Code Submission for Top Albums API Challenge

This project is written using the Laravel framework and utilizes only the base laravel 9.x package compliment.

To run the application run the following command:
```angular2html
php artisan serve
```

All urls routes are formatted as follows:
```
http://<base_url>/api/<endpoint>/<params>
```
# Endpoints
## GET - Top Albums - List
```
http//<base_url>/api/top_albums/{{count}}
```
Returns the top n albums from Apple's iTunes RSS feed

### Parameters
count (integer): Default value is 100

### Options
details (boolean): If set to true, the full response from Apple's RSS will be shown. Otherwise, the response will be a simple list.


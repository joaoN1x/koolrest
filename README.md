#Koolrest

###PHP7 RESTfull easy quick solution based in JSON data exchange

>calculation and sessio endpoint's are examples to show the potential of this solution


##Features
- standard PHP7 support, no need for frameworks or other external vendor resources
- all namespace based
- get/add/update/delete automatic REST calls based on headers (or any other possible)
- sanitize info no matter if coming from GET POST or RawData
- easy extendable for extra classes as autoloader will catch them easy


##Getting Started
All you need to do to have an end-point working is to create a PHP file in doers/ folder, and call it on the url with the same path of the namespace.

 1. Configure your virtualhost to point all calls to index.php file
	 e.g. Apache
```
		 RewriteEngine on
		 RewriteCond %{REQUEST_FILENAME} !index.php
		 RewriteRule .* index.php?url=$0 [QSA,L]
```
	 e.g. Nginx
```
	     location / {
                 try_files $uri $uri/ /index.php?$args;
         }
```
 2. Create your file for the class you want to handle below folder doers/, 
    e.g. <b>doers/stuff.php</b>, and add the code below in to it
``` php
    <?php
    namespace doers;
    class stuff {
        public $return = array("error" => "0", "message" => "");
        public function todo_get($params = array()) : array {
            $this->return['message'] = "I just GET it.";
            return $this->return;
        }
        public function todo_post($params = array()) : array {
            $this->return['message'] = "I just POST it.";
            return $this->return;
        }
        public function todo_put($params = array()) : array {
            $this->return['message'] = "I just PUT it.";
            return $this->return;
        }
        public function todo_delete($params = array()) : array {
            $this->return['message'] = "I just DELETE it.";
            return $this->return;
        }

```
 3. To use a REST GET call just execute
    <b>http://localhost/stuff/todo</b> 
    will return <code>"I just GET it."</code>
    If you send a REST PUT call to the same end point you will get <code>"I just PUT it."</code>

It can't be easier than this, right? ;)


##Follow-up
Next main feature will be to have some constants for https validation, any ideas are welcome.


##Further notes
Created by [joaovieira.com](http://joaovieira.com/) in Planet Earth, at the Universe.
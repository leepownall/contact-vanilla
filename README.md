## Contact Vanilla

Simple contact form that takes name, email and a message and then inserts into the database. All messages are viewable.

[Live Demo](http://leepownall.com/contact)

Validation rules in place are:

* All fields must be present.
* Name must of be alpha characters, i.e. a-z. Spaces are allowed.
* Email must be a valid email address.
* Message has an optional minimum length, default is 10.

Validation is done through the ``` Vanilla\Validation\Validation ``` class.

#### Example

Create new instance of ```$validation = new Vanilla\Validation\Validation;```. Pass the field and data in using the input method, then chain the validation methods you want.  ```$validation->input('name', $name)->required()->alpha()->email()->min(15);``` You can either use ```$validation->passes()``` or ```$validation->fails()``` in an if statement to see if passed/failed etc.

Inserting is simple, simply create a new instance of ```$db = new Vanilla\Database\Message;``` then use the insert method ```$db->insert($name, $email, $message);```. It is not a wrapper so only the three fields can be entered.

#### Installation

Create a database called contact-vanilla.

Run SQL to create table.

``` 
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
```

Composer needs to be installed, once files are in place run ```composer install``` and it will create a vendor directory etc. 
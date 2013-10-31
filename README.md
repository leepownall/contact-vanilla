## Contact Vanilla

Simple contact form that takes name, email and a message and then inserts into the database. All messages are viewable.

Validation rules in place are:

* All fields must be present.
* Name must of be alpha characters, i.e. a-z. Spaces are allowed.
* Email must be a valid email address.
* Message has an optional minimum length, default is 10.

Validation is done through the ``` Vanilla\Validation\Validation ``` class.

#### Example

Create new instance of ```$validation = new Vanilla\Validation\Validation;```. Pass the field and data in, then chain the validation methods you want.  ```$validation->field('name')->data($name)->required()->alpha()->email()->min(15);``` Field is needed to allow for inline errors. Data is the input from the ```$_POST['name']```. You can either use ```$validation->passes()``` or ```$validation->fails()``` in an if statement to see if passed/failed etc.

Inserting is simple, simply create a new instance of ```$db = new Vanilla\Database\Message;``` then use the insert method ```$db->insert($name, $email, $message);```. It is not a wrapper so only the three fields can be entered.
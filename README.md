# sales-tax-problem
Basic sales tax is applicable at a rate of 10% on all goods, except books, food, and medical products that are exempt. Import duty is an additional sales tax applicable on all imported goods at a rate of 5%, with no exemptions. When I purchase items I receive a receipt which lists the name of all the items and their price (including tax), finishing with the total cost of the items, and the total amounts of sales taxes paid. The rounding rules for sales tax are that for a tax rate of n%, a shelf price of p contains (np/100 rounded up to the nearest 0.05) amount of sales tax.

<a href=""><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>



## Pre requistes
- [PHP >= 7.2.5]()
- Mysql 

## FrameWork:
Laravel


Step To Run the Software :<br>
You need to have php server if you don't have installed in your pc you can choose it from below Xamp or wamp

- Install [Wamp](https://bitnami.com/stack/wamp/installer) or [Xampp](https://www.apachefriends.org/it/index.html)
- Now After installing open command prompt and do as below shown
    if you have installed wamp 
   - `C:\> cd wamp64/www`
   - `C:\wamp64\www> git clone https://github.com/nareshbabunuli/sales-tax-problem.git`
   if you have installed xampp
   - `C:\> cd xampp\htdocs`
   - `C:\xampp\htdocs>git clone https://github.com/nareshbabunuli/sales-tax-problem.git`

- Start the wamp or xampp server
- Open phpmydmin 
`localhost:'portnumber'/phpmyadmin`
   example:`http://localhost:80/phpmyadmin/`

Now create new database

Database Name: sales_tax


- Click import in phpmyadmin dashboard
Then import the database file from database folder in project Folder

- Open project folder
   - open .env file edit these below 

    `DB_CONNECTION=mysql`(database example:mysql,sqlite..etc )<br>
    `DB_HOST=127.0.0.1`(your database host) <br>
    `DB_PORT=3306`(database port number)<br>
    `DB_DATABASE=sales_tax`(database name)<br>
    `DB_USERNAME=root`(database username)<br>
    `DB_PASSWORD=`(database password)
`

- Open below link in browser <br>
 `http://localhost/sales-tax-problem/public/`


- now you can see 3 output 
  click edit button to see the results

Thank you 

## License

This is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

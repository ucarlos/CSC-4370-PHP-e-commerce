/* -----------------------------------------------------------------------------
 * Created by Ulysses Carlos for CSC 4370
 * 
 * Note
 *     Please make sure that you've imported the project4.sql file
 *     before running this script as the selections from book_parking
 *     and book_flight require that there be a database.
 *     
 *     
 * -----------------------------------------------------------------------------
 */


use Project;

insert into flight (class_name, capacity, plane_type, price)
values ("Economy", 99, "Boeing 777", 300);

insert into flight (class_name, capacity, plane_type, price)
values ("Premium", 99, "Boeing 777", 350);

insert into flight (class_name, capacity, plane_type, price)
values ("First Class", 99, "Boeing 777", 500);


insert into parking_lots (name, capacity, price)
values ("LotA", "80", 50);

insert into parking_lots (name, capacity, price)
values ("LotB", "40", 80);

insert into parking_lots (name, capacity, price)
values ("LotC", "60", 120);






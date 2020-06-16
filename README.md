# iran-official-holidays
### تعطیلات رسمی ایران 

Tiny library for retrieving Iran's national & religious holidays date.

to install package run :
```
composer require mirzacodenevis\iran-official-holidays
```
retrieve all events with titles and datetime:
```
MirzaCodenevis\Holidays::currentYear()->allEvents();
```
retrieve events by calendar type:
```
MirzaCodenevis\Holidays::currentYear()->shamsiEvents();
MirzaCodenevis\Holidays::currentYear()->qamariEvents();
```
check if today is holiday:
```
MirzaCodenevis\Holidays::currentYear()->isTodayHoliday();
```
change the year:
```
MirzaCodenevis\Holidays::setYear(1396);
```
the event arrays contain event title and
 Carbon, DateTime, and Morilog\Jalalian datetime objects
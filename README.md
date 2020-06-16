# iran-official-holidays
Tiny library for retrieving Iran's national & religious holidays date.

to install package run :
```
composer require mirzacodenevis\iran-official-holidays
```
retrieve all events with titles and datetime:
```
MirzaCodenevis\Holidays\Holidays::allEvents();
```
retrieve events by calendar type:
```
MirzaCodenevis\Holidays\Holidays::shamsiEvents();
MirzaCodenevis\Holidays\Holidays::qamariEvents();
```
check if today is holiday:
```
MirzaCodenevis\Holidays\Holidays::todayIsHoliday();
```
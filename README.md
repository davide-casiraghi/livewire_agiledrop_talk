



### Tinker Factories
```php
<?php

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Sequence;

$user = User::factory()->create([
    'name'  =>  "Davide Casiraghi",
    'email' => 'davide.casiraghi@gmail.com',
]);


User::factory()->count(4)->create();

```
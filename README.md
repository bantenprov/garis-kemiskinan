# Garis Kemiskinan, Jumlah dan Persentase Penduduk Tidak Miskin Menurut Kabupaten/Kota

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bantenprov/garis-kemiskinan/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/garis-kemiskinan/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/bantenprov/garis-kemiskinan/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/garis-kemiskinan/build-status/master)
[![Latest Stable Version](https://poser.pugx.org/bantenprov/garis-kemiskinan/v/stable)](https://packagist.org/packages/bantenprov/garis-kemiskinan)
[![Total Downloads](https://poser.pugx.org/bantenprov/garis-kemiskinan/downloads)](https://packagist.org/packages/bantenprov/garis-kemiskinan)
[![Latest Unstable Version](https://poser.pugx.org/bantenprov/garis-kemiskinan/v/unstable)](https://packagist.org/packages/bantenprov/garis-kemiskinan)
[![License](https://poser.pugx.org/bantenprov/garis-kemiskinan/license)](https://packagist.org/packages/bantenprov/garis-kemiskinan)
[![Monthly Downloads](https://poser.pugx.org/bantenprov/garis-kemiskinan/d/monthly)](https://packagist.org/packages/bantenprov/garis-kemiskinan)
[![Daily Downloads](https://poser.pugx.org/bantenprov/garis-kemiskinan/d/daily)](https://packagist.org/packages/bantenprov/garis-kemiskinan)

Garis Kemiskinan, Jumlah dan Persentase Penduduk Tidak Miskin Menurut Kabupaten/Kota

### Install via composer

- Development snapshot

```bash
$ composer require bantenprov/garis-kemiskinan:dev-master
```

- Latest release:

```bash
$ composer require bantenprov/garis-kemiskinan
```

### Download via github

```bash
$ git clone https://github.com/bantenprov/garis-kemiskinan.git
```

#### Edit `config/app.php` :

```php
'providers' => [

    /*
    * Laravel Framework Service Providers...
    */
    Illuminate\Auth\AuthServiceProvider::class,
    Illuminate\Broadcasting\BroadcastServiceProvider::class,
    Illuminate\Bus\BusServiceProvider::class,
    Illuminate\Cache\CacheServiceProvider::class,
    Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
    Illuminate\Cookie\CookieServiceProvider::class,
    //....
    Bantenprov\GarisKemiskinan\GarisKemiskinanServiceProvider::class
```

#### Lakukan migrate :

```bash
$ php artisan migrate
```

#### Publish database seeder :

```bash
$ php artisan vendor:publish --tag=garis-kemiskinan-seeds
```

#### Lakukan auto dump :

```bash
$ composer dump-autoload
```

#### Lakukan seeding :

```bash
$ php artisan db:seed --class=BantenprovGarisKemiskinanSeeder
```

#### Lakukan publish component vue :

```bash
$ php artisan vendor:publish --tag=garis-kemiskinan-assets
$ php artisan vendor:publish --tag=garis-kemiskinan-public
```
#### Tambahkan route di dalam file : `resources/assets/js/routes.js` :

```javascript
{
    path: '/dashboard',
    redirect: '/dashboard/home',
    component: layout('Default'),
    children: [
        //== ...
        {
         path: '/dashboard/garis-kemiskinan',
         components: {
            main: resolve => require(['./components/views/bantenprov/garis-kemiskinan/DashboardGarisKemiskinan.vue'], resolve),
            navbar: resolve => require(['./components/Navbar.vue'], resolve),
            sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
          },
          meta: {
            title: "Garis Kemiskinan"
           }
       },
        //== ...
    ]
},
```

```javascript
{
    path: '/admin',
    redirect: '/admin/dashboard/home',
    component: layout('Default'),
    children: [
        //== ...
        {
            path: '/admin/garis-kemiskinan',
            components: {
                main: resolve => require(['./components/bantenprov/garis-kemiskinan/GarisKemiskinan.index.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "Garis Kemiskinan"
            }
        },
        {
            path: '/admin/garis-kemiskinan/create',
            components: {
                main: resolve => require(['./components/bantenprov/garis-kemiskinan/GarisKemiskinan.add.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "Add Garis Kemiskinan"
            }
        },
        {
            path: '/admin/garis-kemiskinan/:id',
            components: {
                main: resolve => require(['./components/bantenprov/garis-kemiskinan/GarisKemiskinan.show.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "View Garis Kemiskinan"
            }
        },
        {
            path: '/admin/garis-kemiskinan/:id/edit',
            components: {
                main: resolve => require(['./components/bantenprov/garis-kemiskinan/GarisKemiskinan.edit.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "Edit Garis Kemiskinan"
            }
        },
        //== ...
    ]
},
```
#### Edit menu `resources/assets/js/menu.js`

```javascript
{
    name: 'Dashboard',
    icon: 'fa fa-dashboard',
    childType: 'collapse',
    childItem: [
        //== ...
        {
        name: 'Garis Kemiskinan',
        link: '/dashboard/garis-kemiskinan',
        icon: 'fa fa-angle-double-right'
        },
        //== ...
    ]
},
```

```javascript
{
    name: 'Admin',
    icon: 'fa fa-lock',
    childType: 'collapse',
    childItem: [
        //== ...
        {
        name: 'Garis Kemiskinan',
        link: '/admin/garis-kemiskinan',
        icon: 'fa fa-angle-double-right'
        },
        //== ...
    ]
},
```

#### Tambahkan components `resources/assets/js/components.js` :

```javascript
//== Garis Kemiskinan

import GarisKemiskinan from './components/bantenprov/garis-kemiskinan/GarisKemiskinan.chart.vue';
Vue.component('echarts-garis-kemiskinan', GarisKemiskinan);

import GarisKemiskinanKota from './components/bantenprov/garis-kemiskinan/GarisKemiskinanKota.chart.vue';
Vue.component('echarts-garis-kemiskinan-kota', GarisKemiskinanKota);

import GarisKemiskinanTahun from './components/bantenprov/garis-kemiskinan/GarisKemiskinanTahun.chart.vue';
Vue.component('echarts-garis-kemiskinan-tahun', GarisKemiskinanTahun);

import GarisKemiskinanAdminShow from './components/bantenprov/garis-kemiskinan/GarisKemiskinanAdmin.show.vue';
Vue.component('admin-view-garis-kemiskinan-tahun', GarisKemiskinanAdminShow);

//== Echarts Group Egoverment

import GarisKemiskinanBar01 from './components/views/bantenprov/garis-kemiskinan/GarisKemiskinanBar01.vue';
Vue.component('garis-kemiskinan-bar-01', GarisKemiskinanBar01);

import GarisKemiskinanBar02 from './components/views/bantenprov/garis-kemiskinan/GarisKemiskinanBar02.vue';
Vue.component('garis-kemiskinan-bar-02', GarisKemiskinanBar02);

//== mini bar charts
import GarisKemiskinanBar03 from './components/views/bantenprov/garis-kemiskinan/GarisKemiskinanBar03.vue';
Vue.component('garis-kemiskinan-bar-03', GarisKemiskinanBar03);

import GarisKemiskinanPie01 from './components/views/bantenprov/garis-kemiskinan/GarisKemiskinanPie01.vue';
Vue.component('garis-kemiskinan-pie-01', GarisKemiskinanPie01);

import GarisKemiskinanPie02 from './components/views/bantenprov/garis-kemiskinan/GarisKemiskinanPie02.vue';
Vue.component('garis-kemiskinan-pie-02', GarisKemiskinanPie02);

//== mini pie charts
import GarisKemiskinanPie03 from './components/views/bantenprov/garis-kemiskinan/GarisKemiskinanPie03.vue';
Vue.component('garis-kemiskinan-pie-03', GarisKemiskinanPie03);
```

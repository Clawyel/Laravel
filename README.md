# Laravel

kitap arşivi için api doc and usage'i inceleyin
*************************************************
e-ticaret örneği için ise demo linki eklenecektir
kurulum yapmak isterseniz php artisan migrate sonrasında php artisan db:seed komutu ile seeder içerisindeki verileri ekletebilirsiniz.
admin ve kullanici olmak üzere iki farklı auth yöntemi kullanılmıştır
admin -> auth('yonetim') admin paneline erişmek için kullanılır
testeticaret.xxx/admin üzerinden admin paneline erişebilirsiniz
admin kaydı oluşturduktan sonra veritabanında users tablosunda ilgili üyenin yoneticimi değerini 1 yapmanız gerekiyor yoksa giriş yapamazsınız

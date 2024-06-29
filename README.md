
### README Dosyası

---

# Admin Paneli

Bu proje, yeni kullanıcı ekleyebiir, silebilir, güncelleyebilir ayrıca müşteri bilgilerini yönetmek için de kullanılan bir PHP tabanlı admin panelidir. Kullanıcılar müşteri ekleyebilir, mevcut müşterileri düzenleyebilir ve silebilir.

## Kurulum

**Gereksinimler:**
    - PHP 7.0 veya daha yeni bir sürüm
    - MySQL Veritabanı
    - Web Sunucusu (Apache, Nginx vb.)

**Veritabanını Kurun:**
    - MySQL sunucunuzda yeni bir veritabanı oluşturun.
    - Aşağıdaki SQL sorgusunu kullanarak gerekli tabloyu oluşturun:

**Dosyaları Yükleyin:**
    - Proje dosyalarını web sunucunuzun kök dizinine yükleyin.

 **Veritabanı Bağlantısını Yapılandırın:**
    - `index.php` dosyasını açın ve veritabanı bağlantı bilgilerinizi düzenleyin:

## Kullanım

- **Müşteri Listesi Görüntüleme:**
    - Ana sayfada (index.php) mevcut müşteri listesini görebilirsiniz.
    
- **Müşteri Ekleme:**
    - "Müşteri Ekle" butonuna tıklayarak yeni bir müşteri ekleyebilirsiniz.

- **Müşteri Düzenleme:**
    - Listede bulunan "Düzenle" butonuna tıklayarak mevcut bir müşteriyi düzenleyebilirsiniz.

- **Müşteri Silme:**
    - Listede bulunan "Sil" butonuna tıklayarak mevcut bir müşteriyi silebilirsiniz.

## Dosya Açıklamaları

- **index.php:**
    - Ana sayfa. Müşteri listesini gösterir ve CRUD işlemleri için bağlantılar içerir.
    
- **create.php:**
    - Yeni müşteri eklemek için form içerir.
    
- **edit.php:**
    - Mevcut bir müşteriyi düzenlemek için form içerir.
    
- **delete.php:**
    - Mevcut bir müşteriyi silmek için kullanılır.

## Veritabanı Yapısı

- **Veritabanı Adı: proje**

- **Tablo Adı: admin_paneli**


https://github.com/Deryaglmz/PHP_admin_paneli/assets/129391768/03db9e34-b92a-496c-97ba-148544aa20a4


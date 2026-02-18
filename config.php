<?php  // Moodle configuration file for BATU University ULTRA

unset($CFG);
global $CFG;
$CFG = new stdClass();

// ============================================
// DATABASE CONFIGURATION - باستخدام متغيرات البيئة (آمن)
// ============================================
$CFG->dbtype    = 'mysqli';                          // MySQL database
$CFG->dblibrary = 'native';                           // Native MySQL library

// قراءة بيانات قاعدة البيانات من متغيرات البيئة (الموجودة في Vercel)
$CFG->dbhost    = getenv('DB_HOST') ?: 'mysql-1fa03445-abdoali1482006-e39a.k.aivencloud.com:20336';
$CFG->dbname    = getenv('DB_NAME') ?: 'defaultdb';
$CFG->dbuser    = getenv('DB_USER') ?: 'avnadmin';
$CFG->dbpass    = getenv('DB_PASS') ?: '';            // ❌ كلمة السر مش موجودة هنا - آمن!

$CFG->prefix    = 'mdl_';                             // Tables prefix (do not change)

// Advanced database options with SSL
$CFG->dboptions = array(
    'dbpersist' => false,                              // Don't use persistent connections
    'dbsocket' => false,                                // Don't use socket
    'dbport' => '',                                      // Port is already in dbhost
    'dbhandlesoptions' => false,
    'dbcollation' => 'utf8mb4_unicode_ci',              // UTF8 support for Arabic
    'dbssl' => getenv('DB_SSL') ?: 'REQUIRED',          // SSL required for Aiven
);

// ============================================
// SITE URL AND PATHS
// ============================================
$CFG->wwwroot   = getenv('SITE_URL') ?: 'https://batu-lms-ultra.vercel.app';
$CFG->dataroot  = getenv('DATA_ROOT') ?: '/tmp/moodledata';
$CFG->admin     = 'admin';

// ============================================
// LANGUAGE SETTINGS - عربي + إنجليزي
// ============================================
$CFG->lang = getenv('DEFAULT_LANG') ?: 'en';           // Default language: English
$CFG->langlist = getenv('LANG_LIST') ?: 'en,ar';        // Available languages: English, Arabic

// Force language menu for users
$CFG->langmenu = true;                                   // Show language menu
$CFG->autolang = true;                                   // Auto-detect language

// ============================================
// DIRECTORY PERMISSIONS
// ============================================
$CFG->directorypermissions = 02777;                     // Permissions for new directories

// ============================================
// DEBUG SETTINGS - Development vs Production
// ============================================
$CFG->debug = (getenv('DEVELOPMENT_MODE') === 'true') ? 32767 : 0;  // Full debug in dev, off in prod
$CFG->debugdisplay = (getenv('DEVELOPMENT_MODE') === 'true') ? true : false;
$CFG->debugsmtp = false;
$CFG->perfdebug = false;

// ============================================
// SESSION HANDLING
// ============================================
$CFG->session_handler = getenv('SESSION_HANDLER') ?: 'file';
$CFG->session_filepath = getenv('SESSION_PATH') ?: '/tmp/sessions';

// ============================================
// CACHE SETTINGS (Ultra Performance)
// ============================================
$CFG->cachejs = true;                                    // Cache JavaScript files
$CFG->cachetemplates = true;                              // Cache templates
$CFG->rcache = true;                                       // Cache remote content
$CFG->rcachettl = getenv('CACHE_TTL') ?: 86400;            // Cache TTL (24 hours)

// ============================================
// WEB SERVICES (for mobile app)
// ============================================
$CFG->enablewebservices = true;                           // Enable web services
$CFG->enablemobilewebservice = true;                       // Enable mobile web services
$CFG->enablemobileapi = true;                               // Enable mobile API
$CFG->enablemobile = true;                                   // Enable mobile features

// ============================================
// EMAIL SETTINGS (configure later)
// ============================================
$CFG->smtphosts = getenv('SMTP_HOST') ?: '';
$CFG->smtpuser = getenv('SMTP_USER') ?: '';
$CFG->smtppass = getenv('SMTP_PASS') ?: '';
$CFG->smtpsecure = getenv('SMTP_SECURE') ?: 'tls';
$CFG->smtpport = getenv('SMTP_PORT') ?: 587;
$CFG->noreplyaddress = getenv('NOREPLY_EMAIL') ?: 'noreply@batu.edu.eg';

// ============================================
// SSL AND SECURITY - Ultra Security
// ============================================
$CFG->sslproxy = true;                                     // SSL via proxy
$CFG->cronclionly = false;                                  // Cron via web allowed
$CFG->cronremotepassword = '';                               // No remote cron password
$CFG->allowthemechangeonurl = false;                         // Prevent theme changes via URL
$CFG->loginhttps = true;                                      // Force HTTPS login
$CFG->cookiesecure = true;                                    // Secure cookies only
$CFG->cookiehttponly = true;                                  // HTTP only cookies
$CFG->cookiesamesite = 'Lax';                                 // SameSite cookie policy

// ============================================
// LOGGING AND STATISTICS
// ============================================
$CFG->enablelog = true;                                      // Enable logging
$CFG->enablestats = true;                                     // Enable statistics
$CFG->loglifetime = getenv('LOG_LIFETIME') ?: 365;            // Keep logs for 1 year

// ============================================
// PERFORMANCE SETTINGS - Ultra Fast
// ============================================
$CFG->themedesignermode = false;                              // Disable designer mode
$CFG->disableupdatenotifications = false;                      // Show update notifications
$CFG->disableupdateautodeploy = false;                          // Don't auto-deploy updates
$CFG->enableportfolio = true;                                   // Enable portfolios
$CFG->enablecomments = true;                                    // Enable comments
$CFG->enableglobalsearch = true;                                // Enable global search

// ============================================
// BATCH PROCESSING
// ============================================
$CFG->maxusersperpage = getenv('MAX_USERS') ?: 5000;           // Users per page
$CFG->extramemorylimit = getenv('MEMORY_LIMIT') ?: '512M';      // Extra memory for large operations
$CFG->curlcache = getenv('CURL_CACHE') ?: 86400;                // Cache for curl requests

// ============================================
// FILE HANDLING
// ============================================
$CFG->maxbytes = getenv('MAX_FILE_SIZE') ?: 104857600;          // Max file size (100MB)
$CFG->userquota = getenv('USER_QUOTA') ?: 1073741824;           // User quota (1GB)
$CFG->allowattachments = true;                                   // Allow file attachments

// ============================================
// CUSTOM SETTINGS FOR BATU UNIVERSITY
// ============================================
$CFG->universityname = 'جامعة برج العرب التكنولوجية';
$CFG->universityshort = 'BATU';
$CFG->universitylogo = 'logo-batu.png';
$CFG->universityfavicon = 'favicon-batu.ico';

// ============================================
// MAINTENANCE MODE
// ============================================
$CFG->maintenance_enabled = false;                              // Not in maintenance mode
$CFG->maintenance_message = 'نظام جامعة برج العرب تحت التطوير - سيتم العودة قريباً';

// ============================================
// REVERSE PROXY (if needed)
// ============================================
$CFG->reverseproxy = false;                                     // Not using reverse proxy

// ============================================
// PATHS - DO NOT REMOVE
// ============================================
require_once(__DIR__ . '/lib/setup.php');  // LOADS MOODLE CORE - DO NOT DELETE
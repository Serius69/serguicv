/**
 * Lightweight static file server for local development.
 * Serves the /public directory on port 8002 so PHP artisan serve
 * (single-threaded on Windows) only needs to handle the HTML page,
 * while Node's event loop handles all concurrent asset requests.
 *
 * Run via dev.bat — do not start manually.
 */
const http = require('http');
const fs   = require('fs');
const path = require('path');

const PUBLIC_DIR = path.join(__dirname, 'public');
const PORT       = 8002;

const MIME = {
  '.css':   'text/css',
  '.js':    'application/javascript',
  '.mjs':   'application/javascript',
  '.jpg':   'image/jpeg',
  '.jpeg':  'image/jpeg',
  '.png':   'image/png',
  '.gif':   'image/gif',
  '.webp':  'image/webp',
  '.svg':   'image/svg+xml',
  '.ico':   'image/x-icon',
  '.woff':  'font/woff',
  '.woff2': 'font/woff2',
  '.ttf':   'font/ttf',
  '.eot':   'application/vnd.ms-fontobject',
  '.otf':   'font/otf',
  '.pdf':   'application/pdf',
  '.json':  'application/json',
  '.map':   'application/json',
  '.html':  'text/html',
  '.txt':   'text/plain',
};

http.createServer((req, res) => {
  // Strip query string
  const urlPath   = req.url.split('?')[0];
  const filePath  = path.normalize(path.join(PUBLIC_DIR, urlPath));

  // Security: block path traversal
  if (!filePath.startsWith(PUBLIC_DIR + path.sep) && filePath !== PUBLIC_DIR) {
    res.writeHead(403);
    res.end('Forbidden');
    return;
  }

  fs.stat(filePath, (statErr, stat) => {
    if (statErr || stat.isDirectory()) {
      res.writeHead(404);
      res.end('Not found');
      return;
    }

    const ext         = path.extname(filePath).toLowerCase();
    const contentType = MIME[ext] || 'application/octet-stream';

    res.writeHead(200, {
      'Content-Type':  contentType,
      'Cache-Control': 'no-cache, no-store',
      'Access-Control-Allow-Origin': 'http://localhost:8001',
    });

    fs.createReadStream(filePath).pipe(res);
  });
}).listen(PORT, '127.0.0.1', () => {
  console.log(`[static] Assets en http://localhost:${PORT}`);
});

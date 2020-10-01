FROM node:14.11 as node-builder

RUN git clone -b master --depth=1 https://github.com/BASICEXE/blog-challenge.git /builder

WORKDIR /builder/www

RUN npm i
RUN npm run prod

FROM nginx:1.18

RUN mkdir -p /var/blog/www/public
RUN echo '<?php ' > /var/blog/www/public/index.php

COPY conf/default.conf /etc/nginx/conf.d/default.conf

# フロントファイルの設置
COPY --from=node-builder /builder/www/public/mix-manifest.json /var/www/public/mix-manifest.json
COPY --from=node-builder /builder/www/public/css/app.css /var/www/public/css/app.css
COPY --from=node-builder /builder/www/public/js/app.js /var/www/public/js/app.js



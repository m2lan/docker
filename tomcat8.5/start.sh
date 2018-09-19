docker run -d -p 8080:8080 --name mytomcat8.5 \
    -v /root/mydocker/tomcat/test:/usr/local/apache-tomcat-8.5.34/webapps/test \
    -v /root/mydocker/tomcat/logs:/usr/local/apache-tomcat-8.5.34/logs \
    m2lan/tomcat8.5
FROM centos

MAINTAINER m2lan 763960267@qq.com

COPY a.txt /usr/local/a.txt

ADD jdk-8u181-linux-x64.tar.gz /usr/local/
ADD apache-tomcat-8.5.34.tar.gz /usr/local/

ENV JAVA_HOME /usr/local/jdk1.8.0_181
ENV CLASSPATH $JAVA_HOME/jre/lib/rt.jar:$JAVA_HOME/lib/dt.jar:$JAVA_HOME/lib/tools.jar
ENV PATH $PATH:$JAVA_HOME/bin 
ENV CATALINA_HOME /usr/local/apache-tomcat-8.5.34
ENV MYPATH /usr/local/
WORKDIR $MYPATH

RUN yum install -y vim

EXPOSE 8080

CMD /usr/local/apache-tomcat-8.5.34/bin/startup.sh && tail -f /usr/local/apache-tomcat-8.5.34/logs/catalina.out
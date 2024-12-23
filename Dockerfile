FROM openjdk:21-jdk-slim as build

WORKDIR /app

COPY target/todo_api-0.0.1-SNAPSHOT.jar /app/todo_api.jar

EXPOSE 8080

EXPOSE 5005

ENTRYPOINT ["java", "-agentlib:jdwp=transport=dt_socket,server=y,suspend=n,address=0.0.0.0:5005", "-jar", "/app/todo_api.jar"]


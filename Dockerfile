FROM openjdk:21-jdk-slim as build

WORKDIR /app

RUN apt-get update && apt-get install -y maven

EXPOSE 8080
EXPOSE 5005

CMD ["./mvnw", "spring-boot:run"]

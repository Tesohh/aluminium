
FROM golang:1.23.1-alpine3.20 AS build

WORKDIR /build

COPY /discord ./discord
COPY go.work  .

RUN go build ./discord


FROM python:3.12-alpine3.20

WORKDIR /app

COPY alumix/ ./alumix
COPY requirements.txt .

RUN pip3 install -r requirements.txt --no-cache

COPY --from=build /build/alumix-ceo .

CMD ./alumix-ceo

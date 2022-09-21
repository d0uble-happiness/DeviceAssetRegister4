<?php

namespace App\Device;

class DeviceMapper
{
  public function __construct( # PHP 8 construct
    private \PDO $pdo,
  ) {
  }

  public function getById(int $assetTag): bool | array
  {
    $sql = '
    SELECT * FROM devices WHERE assetTag = :assetTag
';
    $stmt = $this->pdo->prepare($sql);

    if (!$stmt->execute(['assetTag' => $assetTag])) {
      return false;
    }

    return $stmt->fetch();
  }

  public function getAll(): bool | array
  {
    $sql = 'SELECT * FROM devices';
    $result = $this->pdo->query($sql);

    if (!$result) {
      return false;
    }

    return $result->fetchAll();
  }

  public function create(array $data)
  {
    $sql = "INSERT INTO devices(assetTag, assignedTo, dateBought, dateDecommissioned, deviceType, operatingSystem) 
            VALUES (:assetTag, :assignedTo, :dateBought', :dateDecommissioned', :deviceType, :operatingSystem)";
    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute(
      [
        'assetTag' => $data['assetTag'],
        'assignedTo' => $data['assignedTo'],
        'dateBought' => $data['dateBought'],
        'dateDecommissioned' => $data['dateDecommissioned'],
        'deviceType' => $data['deviceType'],
        'operatingSystem' => $data['operatingSystem'],
      ]
    );
  }

  public function update(array $data): bool
  {
    $sql = "UPDATE devices 
    SET assignedTo = :assignedTo,
    assignedTo = :assignedTo, 
    dateBought = :dateBought, 
    dateDecommissioned = :dateDecommissioned, 
    deviceType = :deviceType, 
    operatingSystem = :operatingSystem, 
    WHERE assetTag = :assetTag";
    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute(
      [
        'assetTag'      => $data['assetTag'],
        'assignedTo'    => $data['assignedTo'],
        'dateBought' => $data['dateBought'],
        'dateDecommissioned'  => $data['dateDecommissioned'],
        'deviceType' => $data['deviceType'],
        'operatingSystem'  => $data['operatingSystem'],
      ]
    );
  }

  public function delete(int $assetTag): bool
  {
    $sql = '
            DELETE FROM devices
            WHERE assetTag = :assetTag
        ';
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['assetTag' => $assetTag]);
  }
}
